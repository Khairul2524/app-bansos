<?php

namespace App\Models;

use CodeIgniter\Model;

class Bantuan_Model extends Model
{
    protected $table      = 'bantuan';
    protected $primaryKey = 'id_bantuan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_penduduk', 'id_bobot', 'id_kriteria'];
}
