<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananPenggunaModel;

class Home extends BaseController
{
    public function index(): string
    {
        $pesananModel = new PesananPenggunaModel();

        $orders = $pesananModel->findAll();

        return view('pages/home', ['orders' => $orders]);
    }
}
