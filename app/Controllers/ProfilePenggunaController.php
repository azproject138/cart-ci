<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class ProfilePenggunaController extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $data = $model->find(session()->get('user_id'));  // Ambil data pengguna berdasarkan ID sesi
        return view('profile/index', ['user' => $data]);
    }

    public function uploadProfilePengguna()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        // Validasi file upload
        if (!$this->validate([
            'profile_picture' => [
                'rules' => 'uploaded[profile_picture]|is_image[profile_picture]|max_size[profile_picture,2048]|mime_in[profile_picture,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto profil harus dipilih.',
                    'is_image' => 'File yang dipilih harus gambar.',
                    'max_size' => 'Ukuran gambar terlalu besar, maksimal 2MB.',
                    'mime_in' => 'Format gambar yang diizinkan adalah JPG, JPEG, dan PNG.',
                ],
            ],
        ])) {
            return redirect()->to('/profile')->withInput();
        }

        $file = $this->request->getFile('profile_picture');
        $userId = session()->get('user_id');
        $newName = $userId . '_' . $file->getRandomName(); // Nama file menggunakan ID pengguna + nama acak
        $file->move(WRITEPATH . 'uploads/profiles', $newName);

        // Simpan nama file di database
        $model = new UserModel();
        $data = [
            'profile_picture' => $newName,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $model->update($userId, $data);

        return redirect()->to('/profile')->with('success', 'Foto profil berhasil diupdate!');
    }

    public function deleteProfilePengguna()
    {
        $model = new UserModel();
        $user = $model->find(session()->get('user_id'));

        // Hapus foto profil lama jika ada
        if ($user['profile_picture'] !== 'default-profile.jpg') {
            unlink(WRITEPATH . 'uploads/profiles/' . $user['profile_picture']);
        }

        // Reset foto profil ke default
        $data = [
            'profile_picture' => 'default-profile.jpg',
        ];

        $model->update(session()->get('user_id'), $data);

        return redirect()->to('/profile')->with('success', 'Foto profil berhasil dihapus.');
    }
}