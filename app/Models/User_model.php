<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'password', 'id_level'];
}
