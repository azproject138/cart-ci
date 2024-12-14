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
        return view('profile/index', ['username' => session()->get('username')]);
    }

    public function uploadPicture()
    {
        $file = $this->request->getFile('profile_picture');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/profile_pictures', $fileName);

            $userModel = new UserModel();
            $userId = session('user_id');

            if (!$userId) {
                return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu.');
            }

            $userModel->update($userId, ['profile_picture' => $fileName]);

            return redirect()->to('/profile')->with('success', 'Foto profil berhasil diperbarui.');
        }
        return redirect()->back()->with('error', 'Gagal mengunggah foto profil.');
    }
}
