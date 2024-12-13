<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProfileFieldsToUsers extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('users', [
            'profile_picture' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'whatsapp_number' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => true,
            ],
            'otp_code' => [
                'type' => 'VARCHAR',
                'constraint' => '6',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('users', ['profile_picture', 'address', 'whatsapp_number', 'otp_code']);
    }
}
