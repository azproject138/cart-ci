<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        $user = null;
        if (session()->has('user_id')) {
            $userModel = new UserModel();
            $user = $userModel->find(session('user_id'));
        }

        return view('home', ['user' => $user]);
    }
}
