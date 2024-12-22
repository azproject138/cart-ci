<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class SettingController extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('is_logged_in')) {
            return redirect()->to('/login');
        }
        $userId = $session->get('user_id'); // Ambil ID pengguna dari sesi login
        $db = \Config\Database::connect();
        $builder = $db->table('users');

        // Ambil data pengguna
        $user = $builder->where('id', $userId)->get()->getRowArray();

        return view('setting/index', ['user' => $user]);
    }

    public function updateUsernamePengguna()
    {
        $session = session();
        $userModel = new UserModel();

        $userId = $session->get('user_id');
        $newUsername = $this->request->getPost('new_username');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Validasi jika username kosong
        if (empty($newUsername)) {
            return redirect()->to('/settings')->with('error', 'Username tidak boleh kosong.');
        }

        // Update username di database
        $updateResult = $userModel->update($userId, ['username' => $newUsername]);

        if (!$updateResult) {
            // Debugging untuk query gagal
            return redirect()->to('/settings')->with('error', 'Gagal memperbarui username. Pengguna tidak ditemukan.');
        }

        // Update session
        $session->set('username', $newUsername);

        return redirect()->to('/settings')->with('success', 'Username berhasil diperbarui.');
    }

    public function updateEmailPengguna()
    {
        $session = session();
        $userId = $session->get('user_id');

        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');

            $db = \Config\Database::connect();
            $builder = $db->table('users');

            // Validasi email unik
            $existing = $builder->where('email', $email)->where('id !=', $userId)->countAllResults();
            if ($existing > 0) {
                return redirect()->to('/settings')->with('error', 'Email sudah digunakan.');
            }

            // Perbarui email dan set status email belum diverifikasi
            $builder->where('id', $userId);
            $builder->update(['email' => $email, 'is_email_verified' => 0]);

            // Kirim email verifikasi
            $this->sendVerificationEmail($email);

            return redirect()->to('/settings')->with('success', 'Email berhasil diperbarui. Silakan verifikasi email Anda.');
        }
    }

    public function sendVerificationEmail($email)
    {
        $verificationLink = base_url('user/verify-email-pengguna?email=' . urlencode($email));

        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setSubject('Verifikasi Email Anda');
        $emailService->setMessage("Klik tautan berikut untuk memverifikasi email Anda: <a href='{$verificationLink}'>Verifikasi Email</a>");

        $emailService->send();
    }

    public function verifyEmailPengguna()
    {
        $email = $this->request->getGet('email');

        if ($email) {
            $db = \Config\Database::connect();
            $builder = $db->table('users');

            // Perbarui status email menjadi diverifikasi
            $builder->where('email', $email)->update(['is_email_verified' => 1]);

            return redirect()->to('/settings')->with('success', 'Email berhasil diverifikasi.');
        }

        return redirect()->to('/settings')->with('error', 'Verifikasi email gagal.');
    }
}