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
        $userId = session()->get('user');
        $user = $this->userModel->find($userId);
        return view('setting/index', ['user' => $user]);
    }

    public function updateUsernamePengguna()
    {
        $data = $this->request->getPost();
        $userId = session()->get('user');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|is_unique[users.username,id,' . $userId . ']',
        ]);

        if (!$validation->run($data)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->userModel->update($userId, ['username' => $data['username']]);
        return redirect()->back()->with('success', 'Username updated successfully.');
    }

    public function updateEmailPengguna()
    {
        $data = $this->request->getPost();
        $userId = session()->get('user');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email|is_unique[users.email,id,' . $userId . ']',
        ]);

        if (!$validation->run($data)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->userModel->update($userId, ['email' => $data['email']]);
        return redirect()->back()->with('success', 'Email updated successfully.');
    }

    public function verifyEmailPengguna()
    {
        // Logic for sending verification email
        $userId = session()->get('user');
        $user = $this->userModel->find($userId);

        if ($user['email_verified'] == 1) {
            return redirect()->back()->with('info', 'Email already verified.');
        }

        // Simulate sending an email
        // You can implement real email sending logic here using a library like PHPMailer or CodeIgniter's Email class.
        $this->userModel->update($userId, ['email_verified' => 1]);

        return redirect()->back()->with('success', 'Verification email sent successfully.');
    }

    public function updatePasswordPengguna()
    {
        $data = $this->request->getPost();
        $userId = session()->get('user');
        $user = $this->userModel->find($userId);

        if (!password_verify($data['old_password'], $user['password'])) {
            return redirect()->back()->with('error', 'Old password is incorrect.');
        }

        if ($data['new_password'] !== $data['confirm_password']) {
            return redirect()->back()->with('error', 'New passwords do not match.');
        }

        $this->userModel->update($userId, ['password' => password_hash($data['new_password'], PASSWORD_BCRYPT)]);
        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}