<?php

namespace App\Controllers;

use App\Models\UserModel;

class AlamatPenggunaController extends BaseController
{
    public function getAlamatByUserId($userId)
    {
        $userModel = new UserModel();
        $user = $userModel->find($userId);
        return $user ? $user['alamat'] : '';
    }

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Menampilkan daftar alamat pengguna
    public function index()
    {
        $userId = session()->get('user_id'); // Ambil user_id dari session
        $user = $this->userModel->find($userId);

        return view('profile/index', ['user' => $user]);
    }

    // Menambahkan atau mengedit alamat
    public function tambahAlamatPengguna()
    {
        $userId = session()->get('user_id');
        $data = [
            'alamat' => $this->request->getPost('alamat'),
            'tipe_alamat' => $this->request->getPost('tipe_alamat'),
            'alamat_utama' => $this->request->getPost('utama') ? 1 : 0
        ];

        // Update data pengguna
        $this->userModel->update($userId, $data);

        return redirect()->to('/alamat')->with('success', 'Alamat berhasil disimpan.');
    }

    // Menghapus alamat
    public function hapusAlamatPengguna()
    {
        $userId = session()->get('user_id');
        $this->userModel->update($userId, [
            'alamat' => null,
            'tipe_alamat' => null,
            'alamat_utama' => 0
        ]);

        return redirect()->to('/alamat')->with('success', 'Alamat berhasil dihapus.');
    }

}
