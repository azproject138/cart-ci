<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Email\Email;

class Auth extends BaseController
{
    public function register()
    {

        return view('auth/register');

        $validation = \Config\Services::validation();
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        if ($userModel->insert($data)) {
            session()->setFlashdata('success', 'Registrasi berhasil! Silakan login untuk melanjutkan.');
            return redirect()->to('/login');
        }

        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    public function processRegister()
    {
        $userModel = new UserModel();

        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'Passwords tidak cocok.')->withInput();
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $userModel->insert($data);

        return redirect()->to('/login')->with('sukses', 'Selamat anda berhasil membuat Akun! silahkan login.');
    }

    public function login()
    {

        return view('auth/login');

        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user' => [
                    'id'       => $user['id'],
                    'username' => $user['username'],
                    'email'    => $user['email'],
                ],
                'logged_in' => true,
            ]);

            $session = session();

            $userModel = new UserModel();
            $user = $userModel->find($session->get('user_id'));

            $session->set('profile_picture', $user['profile_picture'] ?? 'default.png');

            session()->setFlashdata('success', 'Login berhasil! Selamat datang di dashboard.');
            return redirect()->to('/dashboard');
        }

        session()->setFlashdata('error', 'Email atau password salah.');
        return redirect()->back()->withInput();
    }

    public function processLogin()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Email atau Password tidak valid.')->withInput();
        }

        session()->set('user', [
            'id'       => $user['id'],
            'username' => $user['username'],
            'email'    => $user['email'],
        ]);

        return redirect()->to('/dashboard')->with('success', 'Selamat, Login berhasil, ' . $user['username']);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    private function sendWrongPasswordEmail($email)
    {
        $emailConfig = new Email();
        $emailConfig->setFrom('no-reply@example.com', 'Auth System');
        $emailConfig->setTo($email);
        $emailConfig->setSubject('Peringatan: Percobaan Login Gagal');
        $emailConfig->setMessage('Seseorang mencoba masuk dengan password yang salah. Jika ini bukan Anda, segera ubah password.');

        $emailConfig->send();
    }
}
