<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserWhatsAppController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Menampilkan halaman daftar nomor WhatsApp
    public function index()
    {
        $userId = session()->get('user_id'); // Ambil user_id dari session
        $user = $this->userModel->find($userId);

        return view('profile/index', ['user' => $user]);
    }

    // Menambahkan nomor WhatsApp
    public function tambahWhatsAppPengguna()
    {
        $userId = session()->get('user_id'); // Ambil user_id dari session
        $whatsappNumber = $this->request->getPost('whatsapp_number');
        $isMain = $this->request->getPost('is_main') ? 1 : 0;

        $data = [
            'whatsapp_number' => $whatsappNumber,
            'is_main_whatsapp' => $isMain
        ];

        // Menambahkan atau mengupdate data nomor WhatsApp
        $this->userModel->update($userId, $data);

        return redirect()->to('/whatsapp');
    }

    // Mengedit nomor WhatsApp
    public function editWhatsAppPengguna()
    {
        $userId = session()->get('user_id'); // Ambil user_id dari session
        $whatsappNumber = $this->request->getPost('whatsapp_number');
        $isMain = $this->request->getPost('is_main') ? 1 : 0;

        $data = [
            'whatsapp_number' => $whatsappNumber,
            'is_main_whatsapp' => $isMain
        ];

        $this->userModel->update($userId, $data);

        return redirect()->to('/whatsapp');
    }

    // Menghapus nomor WhatsApp
    public function hapuseWhatsAppPengguna()
    {
        $userId = session()->get('user_id'); // Ambil user_id dari session
        $this->userModel->update($userId, ['whatsapp_number' => null, 'is_main_whatsapp' => 0]);

        return redirect()->to('/whatsapp')->with('success', 'Nomor WhatsApp berhasil dihapus.');
    }
}
