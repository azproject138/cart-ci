<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfilePenggunaController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id')); // Asumsi session menyimpan ID pengguna yang login
        
        return view('profile/index', ['user' => $user]);
    }

    public function uploadProfilePengguna()
    {
        if ($this->request->getMethod() == 'post') {
            $validationRule = [
                'profile_picture' => [
                    'rules' => 'uploaded[profile_picture]|max_size[profile_picture,1024]|is_image[profile_picture]|mime_in[profile_picture,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Pilih gambar untuk di-upload.',
                        'max_size' => 'Ukuran gambar terlalu besar.',
                        'is_image' => 'File yang di-upload harus berupa gambar.',
                        'mime_in' => 'Hanya gambar JPG, JPEG, atau PNG yang diperbolehkan.'
                    ]
                ]
            ];

            if ($this->validate($validationRule)) {
                $file = $this->request->getFile('profile_picture');
                $fileName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $fileName);

                // Simpan nama file ke database
                $userModel = new UserModel();
                $userModel->update(session()->get('user_id'), [
                    'profile_picture' => $fileName
                ]);

                return redirect()->to('/profile')->with('message', 'Foto profil berhasil diubah.');
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }
    }

    public function deleteProfilePengguna()
    {
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));

        // Hapus foto profil dari server jika ada
        if ($user['profile_picture'] != 'default.jpg') {
            unlink(WRITEPATH . 'uploads/' . $user['profile_picture']);
        }

        // Set foto profil kembali ke default
        $userModel->update(session()->get('user_id'), [
            'profile_picture' => 'default.jpg'
        ]);

        return redirect()->to('/profile')->with('message', 'Foto profil berhasil dihapus.');
    }
}