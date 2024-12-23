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

        // Jika data pengguna tidak ditemukan, arahkan ke login
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Pengguna tidak ditemukan.');
        }

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
            return $this->response->download(WRITEPATH . 'uploads/profiles/default-profile.jpg', null);
        }
    }

    public function deleteProfilePengguna()
    {
        $session = session();
        $userId = $session->get('user_id');

        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $user = $builder->where('id', $userId)->get()->getRowArray();

        if ($user && !empty($user['profile_picture']) && $user['profile_picture'] !== 'default-profile.jpg') {
            // Hapus foto profil yang ada di folder
            unlink(WRITEPATH . 'uploads/profiles/' . $user['profile_picture']);

            // Set foto profil ke null
            $builder->where('id', $userId)->update([
                'profile_picture' => null,
            ]);
        }

        return redirect()->to('/profile')->with('success', 'Foto profil berhasil dihapus.');
    }
}