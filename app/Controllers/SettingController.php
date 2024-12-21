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
        $userId = $session->get('user_id'); // Ambil ID pengguna dari sesi login

        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');

            // Validasi username
            if (empty($username) || strlen($username) < 3) {
                return redirect()->to('/settings')->with('error', 'Username harus minimal 3 karakter.');
            }

            $db = \Config\Database::connect();
            $builder = $db->table('users');

            // Perbarui username
            $builder->where('id', $userId);
            $builder->update(['username' => $username]);

            return redirect()->to('/settings')->with('success', 'Username berhasil diperbarui.');
        }
    }
}
