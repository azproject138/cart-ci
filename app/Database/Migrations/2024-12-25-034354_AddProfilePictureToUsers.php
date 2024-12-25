<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddWhatsappNumberToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'whatsapp_number' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'is_main_whatsapp' => [
                'type' => 'TINYINT',
                'constraint' => '1',
                'default' => 0,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'whatsapp_number');
    }
}
