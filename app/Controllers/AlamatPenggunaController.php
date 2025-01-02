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
        $userId = session('id');

        $user = $this->userModel->find($userId);

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Pengguna tidak ditemukan.');
        }

        $data['users'] = [$user];
        return view('components/alamat_pengguna', $data);
    }


    public function tambahAlamatPengguna()
    {
        $userId = session('id');
        $data = [
            'alamat' => $this->request->getPost('alamat'),
            'tipe_alamat' => $this->request->getPost('tipe_alamat'),
            'alamat_utama' => $this->request->getPost('alamat_utama') ? 1 : 0,
        ];

        // Validasi data kosong
        if (empty($data['alamat']) || empty($data['tipe_alamat'])) {
            return redirect()->back()->with('error', 'Alamat atau jenis alamat tidak boleh kosong.');
        }

        // Reset alamat utama jika diperlukan
        if ($data['alamat_utama']) {
            $this->userModel->where('id !=', $userId)->set(['alamat_utama' => 0])->update();
        }

        // Tambahkan atau perbarui alamat pengguna
        $this->userModel->update($userId, $data);

        return redirect()->to('/alamat')->with('success', 'Alamat berhasil ditambahkan.');
    }

    public function updateAlamatPengguna($id)
    {
        $userId = session('id');
        $data = [
            'alamat' => $this->request->getPost('alamat'),
            'tipe_alamat' => $this->request->getPost('tipe_alamat'),
            'alamat_utama' => $this->request->getPost('alamat_utama') ? 1 : 0,
        ];

        if (empty($data['alamat']) || empty($data['tipe_alamat'])) {
            return redirect()->back()->with('error', 'Alamat atau jenis alamat tidak boleh kosong.');
        }

        $exists = $this->userModel->where('id', $id)->first();
        if (!$exists) {
            return redirect()->to('/alamat')->with('error', 'Data tidak ditemukan.');
        }

        if ($data['alamat_utama']) {
            $this->userModel->where('alamat_utama', 1)->set(['alamat_utama' => 0])->update();
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/alamat')->with('success', 'Alamat berhasil diperbarui.');
    }

    public function hapusAlamatPengguna($id)
    {
        $this->userModel->update($id, ['alamat' => null, 'tipe_alamat' => null, 'alamat_utama' => 0]);
        return redirect()->to('/alamat')->with('success', 'Alamat berhasil dihapus');
    }
}
