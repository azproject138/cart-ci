<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfilePenggunaController extends BaseController
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');

        // Pastikan user sudah login
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Ambil data pengguna dari database
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $user = $builder->where('id', $userId)->get()->getRowArray();

        // Kirim variabel $user ke view
        return view('profile/index', ['user' => $user]);
    }

    public function uploadProfilePengguna()
    {
        $session = session();
        $userId = $session->get('user_id');
        
        // Validasi file upload
        if (!$this->validate([
            'profile_picture' => 'uploaded[profile_picture]|is_image[profile_picture]|mime_in[profile_picture,image/jpg,image/jpeg,image/png]|max_size[profile_picture,2048]'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Upload foto gagal, pastikan format file valid.');
        }

        $file = $this->request->getFile('profile_picture');

        // Generate nama file yang unik
        $newName = $file->getRandomName();
        
        // Pindahkan file ke folder 'uploads/profiles/'
        $file->move(ROOTPATH . 'public/uploads/profiles', $newName);

        // Simpan nama file di database
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $userId)->update([
            'profile_picture' => $newName,
        ]);

        return redirect()->to('/profile')->with('success', 'Foto profil berhasil diunggah.');
    }

    public function showFotoProfilePengguna($filename)
    {
        $filePath = WRITEPATH . 'uploads/profiles/' . $filename;

        // Cek apakah file ada
        if (file_exists($filePath)) {
            return $this->response->download($filePath, null);
        } else {
            // Gambar tidak ditemukan, kembalikan gambar default
            return $this->response->download(WRITEPATH . 'uploads/profiles/default.png', null);
        }
    }

    public function deleteProfilePengguna()
    {
        $session = session();
        $userId = $session->get('user_id');
        $db = \Config\Database::connect();
        $builder = $db->table('users');

        // Cari data user berdasarkan ID
        $user = $builder->where('id', $userId)->get()->getRowArray();

        // Jika pengguna ditemukan
        if ($user && !empty($user['profile_picture'])) {
            // Path ke file gambar profil
            $filePath = WRITEPATH . 'uploads/profiles/' . $user['profile_picture'];

            // Cek apakah file gambar profil ada
            if (file_exists($filePath)) {
                // Hapus file gambar
                if (unlink($filePath)) {
                    // Berhasil menghapus file
                    log_message('info', 'Foto profil berhasil dihapus: ' . $filePath);
                    
                    // Update database untuk menghapus foto profil
                    $builder->where('id', $userId)->update(['profile_picture' => null]);

                    // Redirect atau beri pesan sukses
                    return redirect()->to('/profile')->with('success', 'Foto profil berhasil dihapus.');
                } else {
                    // Gagal menghapus file
                    log_message('error', 'Gagal menghapus foto profil: ' . $filePath);
                    return redirect()->back()->with('error', 'Gagal menghapus foto profil.');
                }
            } else {
                // Jika file tidak ditemukan
                log_message('warning', 'File foto profil tidak ditemukan: ' . $filePath);
                return redirect()->back()->with('error', 'Foto profil tidak ditemukan.');
            }
        } else {
            // Jika pengguna tidak ditemukan
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan atau foto profil tidak ada.');
        }
    }
}