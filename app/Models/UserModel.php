<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user1';
    protected $allowedFields = ['username', 'password', 'tipe'];
}
