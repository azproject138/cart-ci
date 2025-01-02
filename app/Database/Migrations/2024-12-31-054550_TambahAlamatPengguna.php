<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahAlamatPengguna extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tipe_alamat' => [
                'type' => 'ENUM',
                'constraint' => ['rumah', 'kantor'],
                'default' => 'rumah',
            ],
            'alamat_utama' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['alamat', 'tipe_alamat', 'alamat_utama']);
    }
}
