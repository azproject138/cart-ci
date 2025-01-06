<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananPenggunaModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use CodeIgniter\HTTP\ResponseInterface;

class PesananPenggunaController extends BaseController
{
    protected $pesananModel;
    protected $userModel;

    public function __construct()
    {
        $this->pesananModel = new PesananPenggunaModel();
        $this->userModel = new \App\Models\UserModel();
    }

    public function index()
    {
        $data['orders'] = $this->pesananModel->findAll();
        return view('pages/home', $data);
    }

    public function createPesananPengguna()
    {
        $data['users'] = $this->userModel->findAll();
        return view('components/pesanan_pengguna', $data);
    }

    public function tambahPesananPengguna()
    {
        if (!$this->validate([
            'jenis_pesanan' => 'required',
            'merek_pesanan' => 'required',
            'kategori_pesanan' => 'required',
            'jumlah_pesanan' => 'required|integer',
            'deskripsi_pesanan' => 'required',
            'alamat' => 'required',
            'whatsapp_number' => 'required',
            'ketentuan_servis' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->back()->with('error', 'Anda harus login terlebih dahulu.');
        }

        $this->pesananModel->save([
            'user_id' => $userId,
            'jenis_pesanan'     => $this->request->getPost('jenis_pesanan'),
            'merek_pesanan'     => $this->request->getPost('merek_pesanan'),
            'kategori_pesanan'  => $this->request->getPost('kategori_pesanan'),
            'jumlah_pesanan'    => $this->request->getPost('jumlah_pesanan'),
            'deskripsi_pesanan' => $this->request->getPost('deskripsi_pesanan'),
            'alamat'            => $this->request->getPost('alamat'),
            'whatsapp_number'   => $this->request->getPost('whatsapp_number'),
            'ketentuan_servis'  => $this->request->getPost('ketentuan_servis'),
        ]);
        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil disimpan.');
    }

    public function editPesananPengguna($id)
    {
        $data['order'] = $this->pesananModel->find($id);
        $data['users'] = $this->userModel->findAll();
        return view('pesanan_pengguna/edit', $data);
    }

    public function updatePesananPengguna($id)
    {
        $this->pesananModel->update($id, [
            'user_id'           => $this->request->getPost('user_id'),
            'jenis_pesanan'     => $this->request->getPost('jenis_pesanan'),
            'merek_pesanan'     => $this->request->getPost('merek_pesanan'),
            'kategori_pesanan'  => $this->request->getPost('kategori_pesanan'),
            'jumlah_pesanan'    => $this->request->getPost('jumlah_pesanan'),
            'deskripsi_pesanan' => $this->request->getPost('deskripsi_pesanan'),
            'alamat'            => $this->request->getPost('alamat'),
            'whatsapp_number'   => $this->request->getPost('whatsapp_number'),
            'ketentuan_servis'  => $this->request->getPost('ketentuan_servis'),
        ]);
        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function hapusPesananPengguna($id)
    {
        $this->pesananModel->delete($id);
        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil dihapus.');
    }
}
