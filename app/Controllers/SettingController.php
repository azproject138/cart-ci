<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class SettingController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $user = $this->userModel->find(session()->get('user')['id']);
        return view('settings', ['user' => $user]);
    }

    public function updateUsernamePengguna()
    {
        $userId = session()->get('user')['id'];
        $newUsername = $this->request->getPost('username');
        
        $model = new UserModel();
        $existingUser = $model->where('username', $newUsername)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Username already exists.');
        }

        $model->update($userId, ['username' => $newUsername]);
        return redirect()->back()->with('success', 'Username updated successfully.');
    }

    public function updateEmailPengguna()
    {
        $userId = session()->get('user')['id'];
        $newEmail = $this->request->getPost('email');

        $model = new UserModel();
        $existingUser = $model->where('email', $newEmail)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'Email already exists.');
        }

        $model->update($userId, ['email' => $newEmail, 'email_verified' => 0]); // Reset email verification status
        return redirect()->back()->with('success', 'Email updated successfully. Please verify your new email.');
    }

    public function verifyEmailPengguna()
    {
        $userId = session()->get('user')['id'];
        $model = new UserModel();
        $user = $model->find($userId);

        // Simulate sending a verification email
        $email = \Config\Services::email();
        $email->setTo($user['email']);
        $email->setSubject('Email Verification');
        $email->setMessage('Please click the link to verify your email.');
        $email->send();

        return redirect()->back()->with('success', 'Verification email sent.');
    }

    public function updatePasswordPengguna()
    {
        $userId = session()->get('user')['id'];
        $newPassword = $this->request->getPost('new_password');
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $model = new UserModel();
        $model->update($userId, ['password' => $hashedPassword]);

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}