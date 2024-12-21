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
        $userId = $session->get('user_id'); // Ambil ID pengguna dari sesi login

        $db = \Config\Database::connect();
        $builder = $db->table('users');

        // Ambil data pengguna
        $user = $builder->where('id', $userId)->get()->getRowArray();

        return view('setting/index', ['user' => $user]);
    }

    public function updateUsernamePengguna()
    {
        $session = session();
        $userId = $session->get('user_id');

        // Validate input
        $newUsername = $this->request->getPost('username');
        if (!$newUsername) {
            return redirect()->back()->with('error', 'Nama pengguna tidak boleh kosong.');
        }

        // Update username
        $userModel = new UserModel();
        $userModel->update($userId, ['username' => $newUsername]);

        return redirect()->to('/settings')->with('success', 'Nama pengguna berhasil diperbarui.');
    }
}
