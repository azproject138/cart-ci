<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananPenggunaModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use CodeIgniter\HTTP\ResponseInterface;

class PesananPenggunaController extends BaseController
{
    protected $PesananPenggunaModel;

    public function __construct()
    {
        $this->PesananPenggunaModel = new PesananPenggunaModel();
    }

    // Tampilkan daftar pesanan
    public function index()
    {
        $data['pesananpenggunas'] = $this->PesananPenggunaModel->findAll();
        return view('pages/home', $data);
    }

    // Tampilkan form tambah pesanan
    public function createPesananPengguna()
    {
        return view('components/pesanan_pengguna');
    }

    // Simpan data pesanan baru
    public function tambahPesananPengguna()
    {
        $data = [
            'jenis_pesanan'     => $this->request->getPost('jenis_pesanan'),
            'merek_pesanan'     => $this->request->getPost('merek_pesanan'),
            'kategori_pesanan'  => $this->request->getPost('kategori_pesanan'),
            'ketentuan_servis'  => $this->request->getPost('ketentuan_servis'),
            'jumlah_pesanan'    => $this->request->getPost('jumlah_pesanan'),
            'deskripsi_pesanan' => $this->request->getPost('deskripsi_pesanan'),
            'alamat'            => $this->request->getPost('alamat'),
            'number_whatsapp'   => $this->request->getPost('number_whatsapp'),
        ];

        $this->PesananPenggunaModel->insert($data);

        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil ditambahkan!');
    }

    // Tampilkan form edit pesanan
    public function editPesananPengguna($id)
    {
        $data['pesananpengguna'] = $this->PesananPenggunaModel->find($id);
        return view('components/edit_pesanan_pengguna', $data);
    }

    // Update data pesanan
    public function updatePesananPengguna($id)
    {
        $data = [
            'jenis_pesanan'     => $this->request->getPost('jenis_pesanan'),
            'merek_pesanan'     => $this->request->getPost('merek_pesanan'),
            'kategori_pesanan'  => $this->request->getPost('kategori_pesanan'),
            'ketentuan_servis'  => $this->request->getPost('ketentuan_servis'),
            'jumlah_pesanan'    => $this->request->getPost('jumlah_pesanan'),
            'deskripsi_pesanan' => $this->request->getPost('deskripsi_pesanan'),
            'alamat'            => $this->request->getPost('alamat'),
            'number_whatsapp'   => $this->request->getPost('number_whatsapp'),
        ];

        $this->PesananPenggunaModel->update($id, $data);

        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil diupdate!');
    }

    // Hapus pesanan
    public function hapusPesananPengguna($id)
    {
        $this->PesananPenggunaModel->delete($id);
        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil dihapus!');
    }
}
