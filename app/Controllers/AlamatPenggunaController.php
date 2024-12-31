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
        return view('profile/index', $data);
    }

    public function tambahAlamatPengguna()
    {
        $data = [
            'alamat' => $this->request->getPost('alamat'),
            'tipe_alamat' => $this->request->getPost('tipe_alamat'),
            'alamat_utama' => $this->request->getPost('alamat_utama') ? 1 : 0,
        ];

        $this->userModel->update(session('user_id'), $data);
        return redirect()->to('/profile')->with('success', 'Address added successfully.');
    }

    public function updateAlamatPengguna($id)
    {
        $data = [
            'alamat' => $this->request->getPost('alamat'),
            'tipe_alamat' => $this->request->getPost('tipe_alamat'),
            'alamat_utama' => $this->request->getPost('alamat_utama') ? 1 : 0,
        ];
    
        if ($this->userModel->update($id, $data)) {
            return redirect()->to('/profile')->with('success', 'Alamat berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Alamat gagal diperbarui.');
        }
    }

    public function hapusAlamatPengguna($id)
    {
        $this->userModel->update($id, [
            'alamat' => null,
            'tipe_alamat' => null,
            'alamat_utama' => 0,
        ]);

        return redirect()->to('/profile')->with('success', 'Address deleted successfully.');
    }
}
