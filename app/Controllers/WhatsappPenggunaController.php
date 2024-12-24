<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WhatsappModel;

class WhatsappPenggunaController extends BaseController
{
    protected $whatsappModel;

    public function __construct()
    {
        $this->whatsappModel = new \App\Models\WhatsappModel();
    }

    public function index()
    {
        $data['numbers'] = $this->whatsappModel->findAll();
        return view('profile/index', $data);
    }

    public function storeNomorWhatsappPengguna()
    {
        $this->validate([
            'whatsapp_number' => 'required|numeric|is_unique[whatsapp_numbers.whatsapp_number]'
        ]);

        $this->whatsappModel->insert([
            'user_id' => 1, // Sesuaikan dengan user yang login
            'whatsapp_number' => $this->request->getPost('whatsapp_number'),
        ]);

        return redirect()->to('/profile')->with('success', 'Nomor WhatsApp berhasil ditambahkan.');
    }

    public function editNomorWhatsappPengguna($id)
    {
        $data['number'] = $this->whatsappModel->find($id);
        return view('whatsapp/edit-whatsapp-pengguna', $data);
    }

    public function updateNomorWhatsappPengguna($id)
    {
        $this->validate([
            'whatsapp_number' => "required|numeric|is_unique[whatsapp_numbers.whatsapp_number,id,{$id}]"
        ]);

        $this->whatsappModel->update($id, [
            'whatsapp_number' => $this->request->getPost('whatsapp_number'),
        ]);

        return redirect()->to('/profile')->with('success', 'Nomor WhatsApp berhasil diperbarui.');
    }

    public function deleteNomorWhatsappPengguna($id)
    {
        $this->whatsappModel->delete($id);
        return redirect()->to('/profile')->with('success', 'Nomor WhatsApp berhasil dihapus.');
    }
}