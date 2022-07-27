<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kriteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kriteria'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'kriteria'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_kriteria', TRUE);

        // Membuat tabel news
        $this->forge->createTable('kriteria', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('kriteria');
    }
}
