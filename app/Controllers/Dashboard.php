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

    public function saveAlamatPengguna()
    {
        $session = session();
        $userId = $session->get('user_id'); // Ambil ID pengguna dari sesi login

        if ($this->request->getMethod() === 'post') {
            $addressType = $this->request->getPost('address_type');
            $address = $this->request->getPost('address');

            $db = \Config\Database::connect();
            $builder = $db->table('user_addresses');

            // Simpan atau update alamat
            $builder->replace([
                'user_id' => $userId,
                'address_type' => $addressType,
                'address' => $address,
            ]);

            return redirect()->to('/upload-address')->with('success', 'Alamat berhasil disimpan!');
        }
    }

    public function viewAlamatPengguna()
    {
        $session = session();
        $userId = $session->get('user_id');

        $db = \Config\Database::connect();
        $builder = $db->table('user_addresses');

        $addresses = $builder->where('user_id', $userId)->get()->getResult();

        return view('upload_address', ['addresses' => $addresses]);
    }

    public function uploadNomorWhatsApp()
    {
        $session = session();
        $userId = $session->get('user_id');

        // Ambil data pengguna
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $user = $builder->where('id', $userId)->get()->getRowArray();

        return view('components/edit_nomor_whatsapp_pengguna', ['user' => $user]);
    }

    public function sendKodeOTP()
    {
        $session = session();
        $userId = $session->get('user_id');
        $newNumber = $this->request->getPost('new_whatsapp_number');

        $otp = random_int(100000, 999999);
        $expiry = date('Y-m-d H:i:s', strtotime('+5 minutes')); // OTP berlaku 5 menit

        // Simpan OTP ke database
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $userId);
        $builder->update([
            'otp_code' => $otp,
            'otp_expiry' => $expiry,
        ]);

        // Kirim OTP ke nomor WhatsApp baru (disimulasikan di sini)
        // NB: Integrasikan dengan API WhatsApp atau SMS Gateway
        log_message('info', "OTP untuk nomor $newNumber adalah $otp");

        return redirect()->back()->with('success', 'OTP telah dikirim ke nomor WhatsApp baru.');
    }

    public function verifyKodeOTP()
    {
        $session = session();
        $userId = $session->get('user_id');
        $inputOtp = $this->request->getPost('otp_code');

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $user = $builder->where('id', $userId)->get()->getRowArray();

        if ($user && $user['otp_code'] === $inputOtp && strtotime($user['otp_expiry']) > time()) {

            $newNumber = $this->request->getPost('new_whatsapp_number');
            $builder->where('id', $userId);
            $builder->update(['whatsapp_number' => $newNumber, 'otp_code' => null, 'otp_expiry' => null]);

            return redirect()->to('/profile')->with('success', 'Nomor WhatsApp berhasil diperbarui!');
        }

        return redirect()->back()->with('error', 'Kode OTP salah atau telah kadaluarsa.');
    }
}
