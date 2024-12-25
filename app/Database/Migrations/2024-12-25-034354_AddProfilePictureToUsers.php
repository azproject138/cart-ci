<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProfilePictureToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'profile_picture' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => 'default-profile.jpg', // Foto default jika belum ada upload
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'profile_picture');
    }
}