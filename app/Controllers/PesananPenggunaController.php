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
        $userId = session()->get('user_id'); // Ambil ID pengguna dari sesi
        $userModel = new \App\Models\UserModel(); // Pastikan model UserModel sudah ada
        $user = $userModel->find($userId); // Cari pengguna berdasarkan ID

        // Kirim data pengguna ke view
        return view('components/pesanan_pengguna', ['user' => $user]);
    }

    public function tambahPesananPengguna()
    {

        $this->pesananModel->save([
            'user_id' => $this->request->getPost('user_id'),
            'jenis_pesanan' => $this->request->getPost('jenis_pesanan'),
            'merek_pesanan' => $this->request->getPost('merek_pesanan'),
            'kategori_pesanan' => $this->request->getPost('kategori_pesanan'),
            'jumlah_pesanan' => $this->request->getPost('jumlah_pesanan'),
            'deskripsi_pesanan' => $this->request->getPost('deskripsi_pesanan'),
            'alamat' => $this->request->getPost('alamat'),
            'whatsapp_number' => $this->request->getPost('whatsapp_number'),
        ]);
        return redirect()->to('/pesanan');
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
            'jumlah_pesanan' => $this->request->getPost('jumlah_pesanan'),
            'deskripsi_pesanan' => $this->request->getPost('deskripsi_pesanan'),
            'alamat' => $this->request->getPost('alamat'),
            'whatsapp_number' => $this->request->getPost('whatsapp_number'),
        ]);
        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil diperbarui.');
    }

    public function hapusPesananPengguna($id)
    {
        $this->pesananModel->delete($id);
        return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil dihapus.');
    }

    public function pesananSelesai()
    {
        $pesananModel = new PesananPenggunaModel();
        $pesananSelesai = $pesananModel->where('status', 'Selesai')->findAll();
    
        return view('pesanan/daftar_selesai', ['pesananSelesai' => $pesananSelesai]);
    }
}
