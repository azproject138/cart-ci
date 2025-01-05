<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTabelAlamatDanWhatsappPengguna extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pesanan_pengguna', [
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
                'after'      => 'id',
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'deskripsi_pesanan',
            ],
            'whatsapp_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
                'after'      => 'alamat',
            ],
        ]);

        // Tambahkan foreign key untuk user_id
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropForeignKey('pesanan_pengguna', 'orders_user_id_foreign');
        $this->forge->dropColumn('pesanan_pengguna', ['user_id', 'alamat', 'whatsapp_number']);
    }
}
