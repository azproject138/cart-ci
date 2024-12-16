<?php

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function main()
    {
        if (!session()->has('user')) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        return view('layouts/main', ['username' => session()->get('username')]);
    }

    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session('user_id'));
        return view('profile/index', ['user' => $user]);
    }

    public function uploadPicture()
    {
        $file = $this->request->getFile('profile_picture');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/profile_pictures', $fileName);
            $userModel = new UserModel();
            $userModel->where('id', session('user_id'))->set(['profile_picture' => $fileName])->update();
            return redirect()->to('/profile')->with('success', 'Foto profil berhasil diperbarui.');
        }
        return redirect()->back()->with('error', 'Gagal mengunggah foto profil.');
    }

    public function updateAddress()
    {
        $address = $this->request->getPost('address');
        $userModel = new UserModel();
        $userModel->update(session('user_id'), ['address' => $address]);
        return redirect()->to('/profile')->with('success', 'Alamat berhasil diperbarui.');
    }

    public function updateWhatsapp()
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
