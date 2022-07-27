<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bantuan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bantuan'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'id_kriteria'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'id_penduduk'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],
            'id_bobot'       => [
                'type'           => 'INT',
                'constraint'     => 11
            ],

        ]);

        // Membuat primary key
        $this->forge->addKey('id_bantuan', TRUE);

        // Membuat tabel news
        $this->forge->createTable('bantuan', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('bantuan');
    }
}
