<?php

namespace App\Models;

use CodeIgniter\Model;

class WhatsappModel extends Model
{
    protected $table = 'whatsapp_numbers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'whatsapp_number', 'is_verified'];

    public function getByUserId($userId)
    {
        return $this->where('user_id', $userId)->findAll();  // Mengambil semua data berdasarkan user_id
    }
}