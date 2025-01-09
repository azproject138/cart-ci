<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToTambahPesananPengguna extends Migration
{
    public function up()
    {
        //
        $this->forge->addColumn('PesananPengguna', [
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['menunggu', 'selesai'],
                'default'    => 'menunggu',
                'null'       => false,
                'after'      => 'tanggal_pesanan',
            ],
        ]);
    }

    public function down()
    {
        //
        $this->forge->dropColumn('PesananPengguna', 'status');
    }

}
