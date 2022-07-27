<?php

namespace App\Models;

use CodeIgniter\Model;

class Penduduk_Model extends Model
{
    protected $table      = 'penduduk';
    protected $primaryKey = 'id_penduduk';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['no_kk', 'nama', 'jenis_kelamin', 'alamat', 'agama', 'status_perkawinan'];
}
