<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'username', 'password', 'level'
    ];
}
