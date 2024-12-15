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

}
