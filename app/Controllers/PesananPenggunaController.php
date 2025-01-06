<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use CodeIgniter\HTTP\ResponseInterface;

class PesananPenggunaController extends BaseController
{
    public function index()
    {
        //
        return view('components/pesanan_pengguna');
    }
}
