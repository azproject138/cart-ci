<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEstimasiWaktuToTambahPesananPengguna extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('PesananPengguna', [
            'estimasi_waktu' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'ketentuan_servis'
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'selesai'],
                'default' => 'pending',
                'after' => 'estimasi_waktu'
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('PesananPengguna', ['estimasi_waktu', 'status']);
    }
}
