<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfilController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session('user')['id']);

        return view('profile/index', ['user' => $user]);
    }

    public function updateProfilePicture()
    {
        $userModel = new UserModel();
        $file = $this->request->getFile('profile_picture');

        if ($file->isValid() && !$file->hasMoved()) {
            $filePath = $file->store('profile_pictures');
            $userModel->update(session('user')['id'], ['profile_picture' => $filePath]);
            return redirect()->to('/profile')->with('success', 'Foto profil berhasil diperbarui.');
        }

        return redirect()->to('/profile')->with('error', 'Gagal mengunggah foto profil.');
    }

    public function updateAddress()
    {
        $address = $this->request->getPost('address');
        $userModel = new UserModel();

        $userModel->update(session('user')['id'], ['address' => $address]);
        return redirect()->to('/profile')->with('success', 'Alamat berhasil diperbarui.');
    }

    public function updateWhatsApp()
    {
        $whatsappNumber = $this->request->getPost('whatsapp_number');
        $otpCode = rand(100000, 999999);

        // Simpan OTP ke database
        $userModel = new UserModel();
        $userModel->update(session('user')['id'], [
            'whatsapp_number' => $whatsappNumber,
            'otp_code' => $otpCode,
        ]);

        // Kirim OTP ke nomor WhatsApp
        // NB: Tambahkan integrasi SMS/WhatsApp Gateway di sini

        return redirect()->to('/profile')->with('success', 'Kode OTP telah dikirim. Harap verifikasi nomor Anda.');
    }

    public function verifyOtp()
    {
        $otpCode = $this->request->getPost('otp_code');
        $userModel = new UserModel();
        $user = $userModel->find(session('user')['id']);

        if ($user['otp_code'] === $otpCode) {
            $userModel->update($user['id'], ['otp_code' => null]);
            return redirect()->to('/profile')->with('success', 'Nomor WhatsApp berhasil diverifikasi.');
        }

        return redirect()->to('/profile')->with('error', 'Kode OTP salah.');
    }
}