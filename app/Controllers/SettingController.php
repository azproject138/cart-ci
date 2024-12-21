<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SettingController extends BaseController
{
    public function index()
    {
        return view('setting/index');
    }

    public function updateUsernamePengguna()
    {
        $session = session();
        $userId = $session->get('user_id');

        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');

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
}
