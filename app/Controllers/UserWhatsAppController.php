<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserWhatsAppModel;

class UserWhatsAppController extends BaseController
{
    protected $userWhatsAppModel;

    public function __construct()
    {
        $this->userWhatsAppModel = new UserWhatsAppModel();
    }

    public function index()
    {
        $data['whatsapp_numbers'] = $this->userWhatsAppModel->where('user_id', session('user_id'))->findAll();
        return view('user_whatsapp/index', $data);
    }

    public function tambahWhatsappPengguna()
    {
        $this->userWhatsAppModel->save([
            'user_id' => session('user_id'),
            'whatsapp_number' => $this->request->getPost('whatsapp_number'),
            'is_primary' => $this->request->getPost('is_primary') ?? false,
        ]);

        return redirect()->to('/user-whatsapp')->with('success', 'Nomor WhatsApp berhasil ditambahkan');
    }

    public function editWhatsappPengguna($id)
    {
        $data['whatsapp'] = $this->userWhatsAppModel->find($id);
        return view('user_whatsapp/edit', $data);
    }

    public function updateWhatsappPengguna($id)
    {
        $this->userWhatsAppModel->update($id, [
            'whatsapp_number' => $this->request->getPost('whatsapp_number'),
            'is_primary' => $this->request->getPost('is_primary') ?? false,
        ]);

        return redirect()->to('/user-whatsapp')->with('success', 'Nomor WhatsApp berhasil diubah');
    }

    public function deleteWhatsappPengguna($id)
    {
        $this->userWhatsAppModel->delete($id);
        return redirect()->to('/user-whatsapp')->with('success', 'Nomor WhatsApp berhasil dihapus');
    }
}
