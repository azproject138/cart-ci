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

        $validation->setRules([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
            ],
            'confirm_password' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]',
            ],
        ]);

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $userModel = new UserModel();

        if ($userModel->insert($data)) {
            // Simpan ke session
            $session = session();
            $session->set([
                'user_id' => $userModel->getInsertID(),
                'username' => $data['username']
            ]);
            $session->set('user', [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email']
            ]);

            return redirect()->to('/login')->with('success', 'Registrasi berhasil');
        } else {
            return redirect()->back()->with('errors', $userModel->errors());
        }
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
                    'user_id'  => $user['id'],
                    'username' => $user['username'],
                    'email'    => $user['email'],
                ],
                'logged_in' => true,
            ]);

            $session = session();
            $session->set([
                'user_id' => $user['id'], // Pastikan ID pengguna valid
                'logged_in' => true,
            ]);
            $session->set('user', [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email']
            ]);

            $userModel = new UserModel();
            $user = $userModel->find($session->get('user_id'));

            $session->set('profile_picture', $user['profile_picture'] ?? 'default.png');

            session()->setFlashdata('success', 'Login berhasil! Selamat datang di dashboard.');
            return redirect()->to('/');
        }

        session()->setFlashdata('error', 'Email atau password salah.');
        return redirect()->back()->withInput();
    }

    public function processLogin()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Email atau Password tidak valid.')->withInput();
        }

        $session->set('user', [
            'id'       => $user['id'],
            'username' => $user['username'],
            'email'    => $user['email'],
            'profile_picture' => $user['profile_picture'],
            'alamat' => $user['alamat'],
            'tipe_alamat' => $user['tipe_alamat'],
            'alamat_utama' => $user['alamat_utama'],
            'logged_in' => true,
        ]);
        $session->set('user_id', $user['id']);

        return redirect()->to('/')->with('success', 'Selamat, Login berhasil, ' . $user['username']);
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
