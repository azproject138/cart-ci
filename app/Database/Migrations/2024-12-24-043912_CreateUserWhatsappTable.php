<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserWhatsappTable extends Migration
{
    public function up()
    {
        // Membuat tabel user_whatsapp
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'whatsapp_number' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_whatsapp');
    }

    public function down()
    {
        // Menghapus tabel user_whatsapp
        $this->forge->dropTable('user_whatsapp');
    }
}