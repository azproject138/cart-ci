<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PesananPengguna extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned'   => true,
                'null' => false,
            ],
            'jenis_pesanan' => [
                'type' => 'ENUM',
                'constraint' => ['Servis Laptop', 'Servis Printer', 'Pasang WiFi', 'Pasang CCTV'],
                'null' => false,
            ],
            'merek_pesanan' => [
                'type' => 'ENUM',
                'constraint' => ['HP', 'Asus', 'Epson', 'Canon', 'TP-Link', 'Hikvision'],
                'null' => false,
            ],
            'kategori_pesanan' => [
                'type' => 'ENUM',
                'constraint' => ['Install Ulang', 'Mati Total', 'Revil Toner', 'Ganti Tinta', 'Order WiFi', 'Order CCTV'],
                'null' => false,
            ],
            'jumlah_pesanan' => [
                'type' => 'INT',
                'null' => false,
            ],
            'deskripsi_pesanan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'alamat' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'whatsapp_number' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => false,
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
        $this->forge->createTable('PesananPengguna');
    }

    public function down()
    {
        $this->forge->dropTable('PesananPengguna');
    }
}
