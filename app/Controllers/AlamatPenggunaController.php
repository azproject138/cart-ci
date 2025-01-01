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
        // Ambil ID pengguna dari session
        $userId = session('id');

        // Ambil data pengguna dari database berdasarkan ID
        $user = $this->userModel->find($userId);

        // Jika pengguna tidak ditemukan
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Pengguna tidak ditemukan.');
        }

        // Kirim data pengguna ke view
        $data['users'] = [$user];
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
            $this->userModel->where('id', session('id'))->set(['is_main_address' => 0])->update();
        }

        $this->userModel->update(session('id'), $data);

        return redirect()->to('/alamat')->with('success', 'Alamat berhasil ditambahkan');
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
            $this->userModel->where('id', session('id'))->set(['is_main_address' => 0])->update();
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/alamat')->with('success', 'Alamat berhasil diperbarui');
    }

    public function hapusAlamatPengguna($id)
    {
        $this->userModel->update($id, ['alamat' => null, 'tipe_alamat' => null, 'alamat_utama' => 0]);
        return redirect()->to('/alamat')->with('success', 'Alamat berhasil dihapus');
    }
}
