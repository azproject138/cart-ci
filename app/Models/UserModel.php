<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields =[
        'username', 'email', 'password', 'created_at', 'profile_picture', 'address', 'whatsapp_number', 'otp_code',
    ];
    protected $useTimestamps = true;
}