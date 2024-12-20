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
        $data = [
            'user' => $user,
            'profile_picture' => $user['profile_picture'] ?? 'default.png', // Menambahkan fallback default
        ];
        return view('profile/index', ['user' => $user]);
    }

    public function profile()
    {
        $session = session();
        $userId = $session->get('user_id'); // Ambil user_id dari session

        $db = db_connect();
        $builder = $db->table('users');
        $user = $builder->where('id', $userId)->get()->getRowArray();

        return view('profile/profile_picture', ['user' => $user]);
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
        $session = session();
        $userId = $session->get('user_id'); // Ambil ID pengguna dari sesi login

        if ($this->request->getMethod() === 'post') {
            $addressType = $this->request->getPost('address_type');
            $address = $this->request->getPost('address');

            $column = $addressType === 'home' ? 'home_address' : 'office_address';

            // Update alamat di database
            $db = \Config\Database::connect();
            $builder = $db->table('users');
            $builder->where('id', $userId);
            $builder->update([$column => $address]);

            return redirect()->to('/dashboard')->with('success', 'Alamat berhasil diperbarui!');
        }
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
