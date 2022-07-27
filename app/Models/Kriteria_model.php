<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteria_Model extends Model
{
    protected $table      = 'kriteria';
    protected $primaryKey = 'id_kriteria';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kriteria', 'jenis', 'bobot'];
}
