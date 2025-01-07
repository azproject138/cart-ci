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
        $data['users'] = $this->userModel->findAll();
        return view('components/pesanan_pengguna', $data);
    }

    public function tambahPesananPengguna()
    {
        if ($this->request->getMethod() === 'post') {
            $userId = $this->request->getPost('user_id');

            // Ambil data user dari tabel users
            $userModel = new UserModel();
            $user = $userModel->find($userId);

            if ($user) {
                $data = [
                    'user_id' => $userId,
                    'jenis_pesanan' => $this->request->getPost('jenis_pesanan'),
                    'merek_pesanan' => $this->request->getPost('merek_pesanan'),
                    'kategori_pesanan' => $this->request->getPost('kategori_pesanan'),
                    'alamat' => $user['alamat'],
                    'whatsapp_number' => $user['whatsapp_number'],
                    'ketentuan_servis' => $this->request->getPost('ketentuan_servis'),
                    'estimasi_waktu' => date('Y-m-d H:i:s', strtotime('+7 days')),
                    'status' => 'Pending',
                ];

                $this->pesananModel->save($data);
                return redirect()->to('/pesanan')->with('success', 'Pesanan berhasil ditambahkan.');
            } else {
                return redirect()->back()->with('error', 'User tidak ditemukan.');
            }
        }

        return view('pesanan/tambah');
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
            'estimasi_waktu' => date('Y-m-d H:i:s', strtotime('+7 days')),
            'status' => 'pending'
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

    public function dataPengguna()
    {
        if ($this->request->isAJAX()) {
            $userId = $this->request->getPost('user_id');
            $userModel = new \App\Models\UserModel();

            $user = $userModel->find($userId);
            if ($user) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'data' => [
                        'alamat' => $user['alamat'],
                        'whatsapp_number' => $user['whatsapp_number']
                    ]
                ]);
            }

            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'User tidak ditemukan.'
            ]);
        }

        return $this->response->setStatusCode(403)->setJSON(['message' => 'Invalid request.']);
    }
}
