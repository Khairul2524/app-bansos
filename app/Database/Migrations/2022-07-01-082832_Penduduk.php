<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penduduk extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_penduduk'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'no_kk'       => [
                'type'           => 'BIGINT',
                'constraint'     => 16
            ],
            'nama'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
            'jenis_kelamin'       => [
                'type'           => 'INT',
                'constraint'     => 1
            ],
            'alamat'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 128
            ],
        ]);
        // Membuat primary key
        $this->forge->addKey('id_penduduk', TRUE);

        // Membuat tabel news
        $this->forge->createTable('penduduk', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('penduduk');
    }
}
