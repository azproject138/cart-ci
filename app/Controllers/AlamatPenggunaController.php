<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlamatPenggunaModel;
use CodeIgniter\HTTP\ResponseInterface;

class AlamatPenggunaController extends BaseController
{
    protected $addressModel;

    public function __construct()
    {
        $this->addressModel = new AlamatPenggunaModel();
    }

    // Menampilkan halaman alamat
    public function index()
    {
        $data['addresses'] = $this->addressModel->where('user_id', session()->get('user_id'))->findAll();
        return view('profile/index', $data);
    }

    // Menambah alamat
    public function createAlamatPengguna()
    {
        if ($this->request->getMethod() === 'post') {
            $data = [
                'user_id'   => session()->get('user_id'),
                'address'   => $this->request->getPost('address'),
                'type'      => $this->request->getPost('type'),
                'is_primary'=> $this->request->getPost('is_primary') ? 1 : 0,
            ];
            $this->addressModel->save($data);
            return redirect()->to('/alamat-pengguna')->with('message', 'Alamat berhasil ditambahkan');
        }

        return view('components/upload_alamat_pengguna');
    }

    // Edit alamat
    public function editAlamatPengguna($id)
    {
        $address = $this->addressModel->find($id);
        if (!$address) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Alamat tidak ditemukan');
        }

        if ($this->request->getMethod() === 'post') {
            $data = [
                'address'   => $this->request->getPost('address'),
                'type'      => $this->request->getPost('type'),
                'is_primary'=> $this->request->getPost('is_primary') ? 1 : 0,
            ];
            $this->addressModel->update($id, $data);
            return redirect()->to('/alamat-pengguna')->with('message', 'Alamat berhasil diperbarui');
        }

        $data['address'] = $address;
        return view('profile/edit-alamat-pengguna', $data);
    }

    // Hapus alamat
    public function hapusAlamatPengguna($id)
    {
        $this->addressModel->delete($id);
        return redirect()->to('/alamat-pengguna')->with('message', 'Alamat berhasil dihapus');
    }
}
