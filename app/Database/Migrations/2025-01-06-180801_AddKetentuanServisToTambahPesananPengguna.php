<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKetentuanServisToTambahPesananPengguna extends Migration
{
    public function up()
    {
        $this->forge->addColumn('PesananPengguna', [
            'ketentuan_servis' => [
                'type' => 'ENUM',
                'constraint' => ['Antar', 'Ambil'],
                'null' => false,
                'after' => 'kategori_pesanan',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('PesananPengguna', 'ketentuan_servis');
    }
}
