<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfilController extends BaseController
{
    public function __construct()
    {
        helper('session');

        if (!session('user_id')) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
    }
    
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session('user_id'));
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }    
        return view('profile/index', ['user' => $user]);
    }

    
    public function uploadPicture()
    {
        $session = session();
        $userId = $session->get('user_id'); // Ambil ID pengguna dari sesi login

        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('profile_picture');

            if ($file->isValid() && !$file->hasMoved()) {
                // Nama file unik untuk menghindari konflik
                $fileName = $file->getRandomName();

                // Pindahkan file ke folder uploads
                $file->move(WRITEPATH . 'uploads/profile_pictures/', $fileName);

                // Simpan ke database
                $db = \Config\Database::connect();
                $builder = $db->table('users');
                $builder->where('id', $userId);
                $builder->update(['profile_picture' => $fileName]);

                return redirect()->to('/profile')->with('success', 'Foto profil berhasil diunggah!');
            }

            return redirect()->to('/profile')->with('error', 'Gagal mengunggah foto profil.');
        }
    }

    public function updateAddress()
    {
        $address = $this->request->getPost('address');
        $userModel = new UserModel();
        $userModel->update(session('user_id'), ['address' => $address]);
        return redirect()->to('/profile')->with('success', 'Alamat berhasil diperbarui.');
    }

    public function updateWhatsApp()
    {
        $whatsapp = $this->request->getPost('whatsapp');
        $otp = rand(100000, 999999);
        $expiration = date('Y-m-d H:i:s', strtotime('+5 minutes'));

        $userModel = new UserModel();
        $userModel->update(session('user_id'), ['whatsapp' => $whatsapp, 'otp' => $otp, 'otp_expiration' => $expiration]);

        // Simulate sending OTP
        log_message('info', "OTP: $otp sent to WhatsApp $whatsapp.");

        return redirect()->to('/profile')->with('info', 'OTP telah dikirim ke nomor WhatsApp Anda.');
    }

    public function verifyOtp()
    {
        $inputOtp = $this->request->getPost('otp');
        $userModel = new UserModel();
        $user = $userModel->find(session('user_id'));

        if ($user['otp'] === $inputOtp && strtotime($user['otp_expiration']) > time()) {
            $userModel->update(session('user_id'), ['otp' => null, 'otp_expiration' => null]);
            return redirect()->to('/profile')->with('success', 'Nomor WhatsApp berhasil diverifikasi.');
        }
        return redirect()->back()->with('error', 'OTP tidak valid atau telah kedaluwarsa.');
    }
}