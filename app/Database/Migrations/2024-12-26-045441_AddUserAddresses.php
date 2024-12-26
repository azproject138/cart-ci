<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserAddresses extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'address_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'address' => [
                'type'           => 'TEXT',
                'null'           => false,
            ],
            'type' => [
                'type'           => 'ENUM',
                'constraint'     => ['rumah', 'kantor'],
                'default'        => 'rumah',
            ],
            'is_primary' => [
                'type'           => 'BOOLEAN',
                'default'        => false,
            ],
        ]);
        $this->forge->addKey('address_id', true);
        $this->forge->addForeignKey('user_id', 'USERS', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_addresses');
    }

    public function down()
    {
        //
        $this->forge->dropTable('user_addresses');
    }
}
