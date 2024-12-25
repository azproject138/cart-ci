<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'profile_picture', 'address', 'whatsapp_number', 'is_main_whatsapp'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function updateUser($id, $data)
    {
        if ($id) {
            return $this->update($id, $data);
        }

        throw new \Exception("ID pengguna tidak valid untuk pembaruan.");
    }
}