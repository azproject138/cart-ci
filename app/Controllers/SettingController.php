<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class SettingController extends BaseController
{
    public function index()
    {
        $session = session();
        $userModel = new UserModel();
        $user = $userModel->find($session->get('user_id'));

        return view('settings/index.php', ['username' => $user['username']]);
    }

    public function updateUsernamePengguna()
    {
        $session = session();
        $userId = $session->get('user_id');

        // Validate input
        $newUsername = $this->request->getPost('username');
        if (!$newUsername) {
            return redirect()->back()->with('error', 'Username cannot be empty');
        }

        // Update username
        $userModel = new UserModel();
        $userModel->update($userId, ['username' => $newUsername]);

        return redirect()->to('/settings')->with('success', 'Username updated successfully');
    }
}
