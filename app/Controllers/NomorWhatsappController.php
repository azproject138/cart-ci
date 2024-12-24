<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class NomorWhatsappController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        $whatsappNumbers = $userModel->where('user_id', $userId)->findAll();

        return view('profile/index', ['whatsappNumbers' => $whatsappNumbers]);
    }

    public function createNomorWhatsappPengguna()
    {
        return view('whatsapp/create-whatsapp-pengguna');
    }

    public function storeNomorWhatsappPengguna()
    {
        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'whatsapp_number' => 'required|regex_match[/^[0-9]{10,15}$/]',
            ];

            if ($this->validate($validationRules)) {
                $userModel = new userModel();
                $userModel->save([
                    'user_id' => session()->get('user_id'),
                    'whatsapp_number' => $this->request->getPost('whatsapp_number'),
                ]);

                return redirect()->to('/whatsapp')->with('message', 'Nomor WhatsApp berhasil ditambahkan.');
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }
    }

    public function editNomorWhatsappPengguna($id)
    {
        $userModel = new userModel();
        $whatsapp = $userModel->find($id);

        return view('whatsapp/edit-whatsapp-pengguna', ['whatsapp' => $whatsapp]);
    }

    public function updateNomorWhatsappPengguna($id)
    {
        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'whatsapp_number' => 'required|regex_match[/^[0-9]{10,15}$/]',
            ];

            if ($this->validate($validationRules)) {
                $userModel = new userModel();
                $userModel->update($id, [
                    'whatsapp_number' => $this->request->getPost('whatsapp_number'),
                ]);

                return redirect()->to('/whatsapp')->with('message', 'Nomor WhatsApp berhasil diperbarui.');
            } else {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }
    }

    public function deleteNomorWhatsappPengguna($id)
    {
        $whatsappModel = new userModel();
        $whatsappModel->delete($id);

        return redirect()->to('/whatsapp')->with('message', 'Nomor WhatsApp berhasil dihapus.');
    }
}
