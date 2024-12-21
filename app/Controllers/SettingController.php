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

        // Periksa apakah pengguna login
        if (!$session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        $userId = $session->get('user_id');
        $db = \Config\Database::connect();
        $builder = $db->table('users');

        // Ambil data pengguna
        $user = $builder->where('id', $userId)->get()->getRowArray();

        if (!$user) {
            return redirect()->to('/dashboard')->with('error', 'Pengguna tidak ditemukan.');
        }

        return view('setting/index', ['user' => $user]);
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
