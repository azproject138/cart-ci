<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesananPenggunaModel;

class Home extends BaseController
{
    protected $pesananModel;

    public function __construct()
    {
        $this->pesananModel = new PesananPenggunaModel();
    }

    public function index(): string
    {
        $orders = $this->pesananModel->findAll();

        $data = [
            'totalPesanan' => $this->pesananModel->countAllResults(),
            'pesananMenunggu' => $this->pesananModel->where('status', 'menunggu')->countAllResults(),
            'orders' => $orders,
        ];
        
        $pesananModel = new PesananPenggunaModel();

        $orders = $pesananModel->findAll();

        return view('pages/home', $data, ['orders' => $orders]);
    }
}
