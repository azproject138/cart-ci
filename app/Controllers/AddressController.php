<?php

namespace App\Controllers;

use App\Models\AddressModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AddressController extends BaseController
{
    protected $addressModel;

    public function __construct()
    {
        $this->addressModel = new AddressModel();
    }

    public function index()
    {
        $userId = session()->get('user_id');
        $addresses = $this->addressModel->where('user_id', $userId)->findAll();

        return view('profile/index', ['addresses' => $addresses]);
    }

    public function createAlamatPengguna()
    {
        return view('components/upload_alamat_pengguna');
    }

    public function tambahAlamatPengguna()
    {
        $userId = session()->get('user_id');
        $data = $this->request->getPost();

        $isPrimary = isset($data['is_primary']) ? 1 : 0;
        if ($isPrimary) {
            $this->addressModel->where('user_id', $userId)->set(['is_primary' => 0])->update();
        }

        $this->addressModel->insert([
            'user_id'   => $userId,
            'address'   => $data['address'],
            'type'      => $data['type'],
            'is_primary' => $isPrimary,
        ]);

        return redirect()->to('/alamat-pengguna')->with('success', 'Alamat berhasil ditambahkan');
    }

    public function editAlamatPengguna($id)
    {
        $address = $this->addressModel->find($id);

        return view('components/edit-alamat-pengguna', ['address' => $address]);
    }

    public function updateAlamatPengguna($id)
    {
        $data = $this->request->getPost();

        $isPrimary = isset($data['is_primary']) ? 1 : 0;
        if ($isPrimary) {
            $userId = session()->get('user_id');
            $this->addressModel->where('user_id', $userId)->set(['is_primary' => 0])->update();
        }

        $this->addressModel->update($id, [
            'address'    => $data['address'],
            'type'       => $data['type'],
            'is_primary' => $isPrimary,
        ]);

        return redirect()->to('/alamat-pengguna')->with('success', 'Alamat berhasil diperbarui');
    }

    public function hapusAlamatPengguna($id)
    {
        $this->addressModel->delete($id);

        return redirect()->to('/alamat-pengguna')->with('success', 'Alamat berhasil dihapus');
    }
}
