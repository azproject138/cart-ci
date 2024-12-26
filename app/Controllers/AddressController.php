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

        return view('addresses/index', ['addresses' => $addresses]);
    }

    public function create()
    {
        return view('addresses/create');
    }

    public function store()
    {
        $userId = session()->get('user_id');
        $data = $this->request->getPost();

        if ($data['is_primary']) {
            $this->addressModel->where('user_id', $userId)->set(['is_primary' => 0])->update();
        }

        $this->addressModel->insert([
            'user_id'   => $userId,
            'address'   => $data['address'],
            'type'      => $data['type'],
            'is_primary' => $data['is_primary'] ?? 0,
        ]);

        return redirect()->to('/addresses')->with('success', 'Alamat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $address = $this->addressModel->find($id);

        return view('addresses/edit', ['address' => $address]);
    }

    public function update($id)
    {
        $data = $this->request->getPost();

        if ($data['is_primary']) {
            $userId = session()->get('user_id');
            $this->addressModel->where('user_id', $userId)->set(['is_primary' => 0])->update();
        }

        $this->addressModel->update($id, [
            'address'    => $data['address'],
            'type'       => $data['type'],
            'is_primary' => $data['is_primary'] ?? 0,
        ]);

        return redirect()->to('/addresses')->with('success', 'Alamat berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->addressModel->delete($id);

        return redirect()->to('/addresses')->with('success', 'Alamat berhasil dihapus');
    }
}
