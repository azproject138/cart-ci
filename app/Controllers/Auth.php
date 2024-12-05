<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Email\Email;

class Auth extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function processRegister()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if ($password !== $confirmPassword) {
            return redirect()->back()->with('error', 'Passwords tidak cocok, silahkan cobalagi.')->withInput();
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $userModel->insert($data);

        return redirect()->to('/login')->with('sukses', 'Selamat anda berhasil membuat akun! silahkan login.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function processLogin()
    {
        $userModel = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak terdaftar.')->withInput();
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah, silahkan cobalagi.')->withInput();
        }

        return redirect()->to('/dashboard')->with('success', 'Welcome back, ' . $user['username'] . '!');
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
