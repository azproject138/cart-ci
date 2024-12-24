<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUploadNomorWhatsappPenggunaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'nomor_whatsapp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('nomor_whatsapp');
    }

    public function down()
    {
        $this->forge->dropTable('nomor_whatsapp');
    }
}
