<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bobot extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bobot'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_kriteria'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'nilai'       => [
                'type'           => 'INT',
                'constraint'     => 1
            ],
            'keterangan'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_bobot', TRUE);

        // Membuat tabel news
        $this->forge->createTable('bobot', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('bobot');
    }
}
