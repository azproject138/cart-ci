<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\PesananPenggunaModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Debug\Toolbar\Collectors\Views;

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
        helper('form');
        $userId = session()->get('user_id');
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($userId);

        // Kirim data pengguna ke view
        return view('components/pesanan_pengguna', ['user' => $user]);
    }

    public function tambahPesananPengguna()
    {

        $pesananPenggunaModel = new \App\Models\PesananPenggunaModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'jenis_pesanan' => 'required',
            'merek_pesanan' => 'required',
            'kategori_pesanan' => 'required',
            'ketentuan_servis' => 'required',
            'jumlah_pesanan' => 'required|integer',
            'deskripsi_pesanan' => 'permit_empty',
            'alamat' => 'required',
            'whatsapp_number' => 'required',
            'tanggal_pesanan' => 'required',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Data yang akan disimpan
        $data = [
            'jenis_pesanan'    => $this->request->getPost('jenis_pesanan'),
            'merek_pesanan'    => $this->request->getPost('merek_pesanan'),
            'kategori_pesanan' => $this->request->getPost('kategori_pesanan'),
            'ketentuan_servis' => $this->request->getPost('ketentuan_servis'),
            'jumlah_pesanan'   => $this->request->getPost('jumlah_pesanan'),
            'deskripsi_pesanan'=> $this->request->getPost('deskripsi_pesanan'),
            'alamat'           => $this->request->getPost('alamat'),
            'whatsapp_number'  => $this->request->getPost('whatsapp_number'),
            'tanggal_pesanan'  => $this->request->getPost('tanggal_pesanan'),
            'user_id'          => session()->get('user_id'),
        ];

        // Simpan data ke database
        if ($pesananPenggunaModel->save($data)) {
            return redirect()->to('/')->with('success', 'Pesanan berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data.');
        }
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
            'user_id' => $this->request->getPost('user_id'),
            'jenis_pesanan' => $this->request->getPost('jenis_pesanan'),
            'merek_pesanan' => $this->request->getPost('merek_pesanan'),
            'kategori_pesanan' => $this->request->getPost('kategori_pesanan'),
            'ketentuan_servis' => $this->request->getPost('ketentuan_servis'),
            'jumlah_pesanan' => $this->request->getPost('jumlah_pesanan'),
            'deskripsi_pesanan' => $this->request->getPost('deskripsi_pesanan'),
            'alamat' => $this->request->getPost('alamat'),
            'whatsapp_number' => $this->request->getPost('whatsapp_number'),
            'tanggal_pesanan' => $this->request->getPost('tanggal_pesanan'),
        ]);
        return redirect()->to('/')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function hapusPesananPengguna($id)
    {
        $this->pesananModel->delete($id);
        return redirect()->to('/')->with('success', 'Pesanan berhasil dihapus.');
    }

    public function pesananSelesai()
    {
        $pesananModel = new PesananPenggunaModel();
        $pesananSelesai = $pesananModel->where('status', 'Selesai')->findAll();
    
        return view('pesanan/daftar_selesai', ['pesananSelesai' => $pesananSelesai]);
    }
}
