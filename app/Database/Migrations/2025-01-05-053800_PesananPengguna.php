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
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis_pesanan' => [
                'type'       => 'ENUM',
                'constraint' => ['jenis pesanan', 'Servis Laptop', 'Servis Printer', 'Pasang WiFi', 'Pasang CCTV'],
                'default'    => 'jenis pesanan',
            ],
            'merek_pesanan' => [
                'type'       => 'ENUM',
                'constraint' => ['merek pesanan', 'HP', 'Asus', 'Epson', 'Canon', 'TP-Link', 'Hikvision'],
                'default'    => 'merek pesanan',
            ],
            'kategori_pesanan' => [
                'type'       => 'ENUM',
                'constraint' => ['kategori pesanan','install ulang', 'mati total', 'revil toner', 'ganti tinta', 'order wifi', 'order cctv'],
                'default'    => 'kategori pesanan',
            ],
            'ketentuan_servis' => [
                'type'       => 'ENUM',
                'constraint' => ['ketentuan servis', 'ambil', 'antar'],
                'default'    => 'ketentuan servis',
            ],
            'jumlah_pesanan' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'deskripsi_pesanan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('pesanan_pengguna');
    }

    public function down()
    {
        $this->forge->dropTable('pesanan_pengguna');
    }
}
