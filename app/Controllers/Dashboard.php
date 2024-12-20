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

    public function updateAlamatPengguna()
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

            return redirect()->to('/profile')->with('success', 'Alamat berhasil diperbarui!');
        }
    }

    public function showForm()
    {
        // Tampilkan form nomor WhatsApp
        return view('components/upload_nomor_whatsapp_pengguna');
    }

    public function sendOtp()
    {
        $session = session();
        $userId = $session->get('user_id');
        $whatsappNumber = $this->request->getPost('whatsapp_number');

        // Cek apakah nomor valid
        if (!preg_match('/^\+?[0-9]{10,15}$/', $whatsappNumber)) {
            return redirect()->back()->with('error', 'Nomor WhatsApp tidak valid!');
        }

        // Generate OTP (6 digit)
        $otp = rand(100000, 999999);

        // Simpan nomor WhatsApp dan OTP di database
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $userId);
        $builder->update([
            'whatsapp_number' => $whatsappNumber,
            'otp_code' => $otp,
            'otp_verified' => 0 // OTP belum diverifikasi
        ]);

        // Kirim OTP ke WhatsApp menggunakan layanan pihak ketiga (contoh)
        // $this->sendOtpToWhatsApp($whatsappNumber, $otp);

        // Kirim OTP berhasil, tampilkan notifikasi
        return redirect()->to('/verify-otp')->with('success', 'OTP telah dikirim!');
    }

    public function verifyOtp()
    {
        $session = session();
        $userId = $session->get('user_id');
        $otpCode = $this->request->getPost('otp_code');

        // Cek apakah OTP cocok
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $userId);
        $user = $builder->get()->getRow();

        if ($user && $user->otp_code === $otpCode) {
            // Verifikasi OTP berhasil
            $builder->update(['otp_verified' => 1]);

            return redirect()->to('/dashboard')->with('success', 'Nomor WhatsApp berhasil diverifikasi!');
        }

        return redirect()->back()->with('error', 'OTP tidak valid!');
    }

    private function sendOtpToWhatsApp($number, $otp)
    {
        // Implementasikan integrasi dengan API layanan WhatsApp (contoh: Twilio, Nexmo, dll.)
        // Kirim pesan OTP ke nomor WhatsApp yang diberikan
    }
}
