<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AlamatPenggunaController extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');
        $db = \Config\Database::connect();
        $builder = $db->table('users');

        // Ambil data alamat pengguna
        $user = $builder->where('id', $userId)->get()->getRowArray();

        return view('profile/index', ['user' => $user]);
    }

    public function create()
    {
        return view('components/create_alamat_pengguna');
    }

    public function store()
    {
        $session = session();
        $userId = $session->get('user_id');

        $homeAddress = $this->request->getPost('home_address');
        $officeAddress = $this->request->getPost('office_address');

        $db = \Config\Database::connect();
        $builder = $db->table('users');

        // Update alamat pengguna
        $builder->where('id', $userId)->update([
            'home_address' => $homeAddress,
            'office_address' => $officeAddress,
        ]);

        return redirect()->to('/alamat-pengguna')->with('success', 'Alamat berhasil disimpan.');
    }

    public function edit($id)
    {
        $session = session();
        $userId = $session->get('user_id');
        if ($userId != $id) {
            return redirect()->to('profile/edit-alamat-pengguna')->with('error', 'Anda tidak diizinkan mengakses alamat ini.');
        }

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $user = $builder->where('id', $id)->get()->getRowArray();

        return view('profile/edit-alamat-pengguna', ['user' => $user]);
    }

    public function update()
    {
        $session = session();
        $userId = $session->get('user_id');

        $homeAddress = $this->request->getPost('home_address');
        $officeAddress = $this->request->getPost('office_address');

        $db = \Config\Database::connect();
        $builder = $db->table('users');

        // Update alamat pengguna
        $builder->where('id', $userId)->update([
            'home_address' => $homeAddress,
            'office_address' => $officeAddress,
        ]);

        return redirect()->to('/alamat-pengguna')->with('success', 'Alamat berhasil diperbarui.');
    }

    public function delete($id)
    {
        $session = session();
        $userId = $session->get('user_id');
        if ($userId != $id) {
            return redirect()->to('/alamat-pengguna')->with('error', 'Anda tidak diizinkan menghapus alamat ini.');
        }

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $id)->update([
            'home_address' => null,
            'office_address' => null,
        ]);

        return redirect()->to('/alamat-pengguna')->with('success', 'Alamat berhasil dihapus.');
    }
}
