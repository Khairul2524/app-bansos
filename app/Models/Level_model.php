<?php

namespace App\Models;

use CodeIgniter\Model;

class Level_Model extends Model
{
    protected $table      = 'level';
    protected $primaryKey = 'id_level';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['level'];
}
