<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WhatsappModel;

class NomorWhatsappController extends BaseController
{
    public function index()
    {
        $whatsappModel = new \App\Models\WhatsappModel();
        $userId = session()->get('user_id');  // Ambil user_id dari session

        // Ambil data berdasarkan user_id
        $data['whatsapp'] = $whatsappModel->where('user_id', $userId)->findAll();

        // Kirim ke view
        return view('profile/index', $data);
    }

    public function saveNomorWhatsappPengguna()
    {
        $whatsappNumber = $this->request->getPost('whatsapp_number');
        $userId = session()->get('user_id');
        
        $whatsappModel = new WhatsappModel();
        $whatsappModel->save([
            'user_id' => $userId,
            'whatsapp_number' => $whatsappNumber,
        ]);

        return redirect()->to('/profile')->with('success', 'Nomor WhatsApp berhasil ditambahkan.');
    }

    public function editNomorWhatsappPengguna($id)
    {
        $whatsappModel = new WhatsappModel();
        $data['whatsapp'] = $whatsappModel->find($id);
        return view('whatsapp/edit-whatsapp-pengguna', $data);
    }

    public function updateNomorWhatsappPengguna($id)
    {
        $whatsappNumber = $this->request->getPost('whatsapp_number');

        $whatsappModel = new WhatsappModel();
        $whatsappModel->update($id, [
            'whatsapp_number' => $whatsappNumber,
        ]);

        return redirect()->to('/whatsapp-whatsapp-pengguna');
    }

    public function deleteNomorWhatsappPengguna($id)
    {
        $whatsappModel = new WhatsappModel();
        $whatsappModel->delete($id);
        return redirect()->to('/whatsapp-whatsapp-pengguna');
    }
}