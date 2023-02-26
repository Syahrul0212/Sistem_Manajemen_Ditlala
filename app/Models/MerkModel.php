<?php

namespace App\Models;

use CodeIgniter\Model;

class MerkModel extends Model
{
    protected $table = 'tb_merk';
    protected $allowedFields = ['nama'];
}
