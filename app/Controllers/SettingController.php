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

        // Pastikan sesi tersedia
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');

            $db = \Config\Database::connect();
            $builder = $db->table('users');

            // Cek apakah username unik
            $existing = $builder->where('username', $username)->where('id !=', $userId)->countAllResults();
            if ($existing > 0) {
                return redirect()->to('/settings')->with('error', 'Username sudah digunakan.');
            }

            // Perbarui username
            $builder->where('id', $userId);
            $builder->update(['username' => $username]);

            return redirect()->to('/settings')->with('success', 'Username berhasil diperbarui.');
        }
    }
}