<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahAlamatPengguna extends Migration
{
    public function up()
    {
        $fields = [
            'alamat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tipe_alamat' => [
                'type' => 'ENUM',
                'constraint' => ['home', 'office'],
                'default' => 'home',
            ],
            'alamat_utama' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['alamat', 'tipe_alamat', 'alamat_utama']);
    }
}
