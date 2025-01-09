<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTanggalPesananToTambahPesananPengguna extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('PesananPengguna', [
            'tanggal_pesanan' => [
                'type' => 'DATE',
                'null' => true,
                'after' => 'deskripsi_pesanan',
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('PesananPengguna', 'tanggal_pesanan');
    }

}
