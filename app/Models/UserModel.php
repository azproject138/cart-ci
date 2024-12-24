<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password', 'profile_picture', 'address'];

    public function updateUser($id, $data)
    {
        if ($id) {
            return $this->update($id, $data);
        }

        throw new \Exception("ID pengguna tidak valid untuk pembaruan.");
    }
}