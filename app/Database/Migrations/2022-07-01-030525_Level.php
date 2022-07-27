<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Level extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_level'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'level'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_level', TRUE);

        // Membuat tabel news
        $this->forge->createTable('level', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('level');
    }
}
