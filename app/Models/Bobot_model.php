<?php

namespace App\Models;

use CodeIgniter\Model;

class Bobot_Model extends Model
{
    protected $table      = 'bobot';
    protected $primaryKey = 'id_bobot';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_kriteria', 'nilai', 'keterangan'];
}
