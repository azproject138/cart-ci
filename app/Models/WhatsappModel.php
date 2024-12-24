<?php

namespace App\Models;

use CodeIgniter\Model;

class WhatsappModel extends Model
{
    protected $table = 'whatsapp_numbers'; // Pastikan tabel sesuai dengan database
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'whatsapp_number', 'is_verified'];
}
