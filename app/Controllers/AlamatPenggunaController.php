<?php

namespace App\Controllers;

use App\Models\UserModel;

class AlamatPenggunaController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('address/index', $data);
    }

    public function tambahAlamatPengguna()
    {
        $data = [
            'alamat' => $this->request->getPost('alamat'),
            'tipe_alamat' => $this->request->getPost('tipe_alamat'),
            'alamat_utama' => $this->request->getPost('alamat_utama') ? 1 : 0,
        ];

        // Jika alamat utama, reset alamat utama lainnya
        if ($data['alamat_utama']) {
            $this->userModel->update(null, ['alamat_utama' => 0]);
        }

        $this->userModel->update(session('id'), $data);

        return redirect()->to('/address')->with('success', 'Alamat berhasil ditambahkan');
    }

    public function updateAlamatPengguna($id)
    {
        $data = [
            'alamat' => $this->request->getPost('alamat'),
            'tipe_alamat' => $this->request->getPost('tipe_alamat'),
            'alamat_utama' => $this->request->getPost('alamat_utama') ? 1 : 0,
        ];

        // Jika alamat utama, reset alamat utama lainnya
        if ($data['alamat_utama']) {
            $this->userModel->update(null, ['alamat_utama' => 0]);
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/address')->with('success', 'Alamat berhasil diperbarui');
    }

    public function hapusAlamatPengguna($id)
    {
        $this->userModel->update($id, ['alamat' => null, 'tipe_alamat' => null, 'alamat_utama' => 0]);
        return redirect()->to('/address')->with('success', 'Alamat berhasil dihapus');
    }
}
