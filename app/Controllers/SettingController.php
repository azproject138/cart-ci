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
        $userModel = new UserModel();

        $userId = $session->get('user_id');
        $newUsername = $this->request->getPost('new_username');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Validasi jika username kosong
        if (empty($newUsername)) {
            return redirect()->to('/settings')->with('error', 'Username tidak boleh kosong.');
        }

        // Update username di database
        $updateResult = $userModel->update($userId, ['username' => $newUsername]);

        if (!$updateResult) {
            // Debugging untuk query gagal
            return redirect()->to('/settings')->with('error', 'Gagal memperbarui username. Pengguna tidak ditemukan.');
        }

        // Update session
        $session->set('username', $newUsername);

        return redirect()->to('/settings')->with('success', 'Username berhasil diperbarui.');
    }
}