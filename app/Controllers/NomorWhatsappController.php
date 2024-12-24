<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\WhatsappModel;

class NomorWhatsappController extends BaseController
{
    public function index()
    {
        $whatsappModel = new WhatsappModel();
        $data['whatsapp'] = $whatsappModel->where('user_id', session()->get('user_id'))->first();
        return view('profile/index', $data);
    }

    public function addNomorWhatsappPengguna()
    {
        return view('whatsapp/add-whatsapp-pengguna');
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

        return redirect()->to('/whatsapp-whatsapp-pengguna');
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