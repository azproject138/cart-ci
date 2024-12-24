<?php

namespace App\Models;

use CodeIgniter\Model;

class WhatsappModel extends Model
{
    protected $table = 'user_whatsapp';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'whatsapp_number'];
    protected $useTimestamps = true;

    public function getByUserId($userId)
    {
        return $this->where('user_id', $userId)->findAll();  // Mengambil semua data berdasarkan user_id
    }
}