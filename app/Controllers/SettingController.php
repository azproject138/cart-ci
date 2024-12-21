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

        // Periksa apakah pengguna login
        if (!$session->get('logged_in')) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        $userId = $session->get('user_id');
        $username = $this->request->getPost('username');

        // Validasi input
        if (empty($username) || strlen($username) < 3) {
            return redirect()->to('/settings')->with('error', 'Username harus minimal 3 karakter.');
        }

        $db = \Config\Database::connect();
        $builder = $db->table('users');

        // Pastikan username unik
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
