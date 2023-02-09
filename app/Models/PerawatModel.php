<?php

namespace App\Models;

use CodeIgniter\Model;

class PerawatModel extends Model
{
    protected $table = 'perawat';
    protected $allowedFields = ['nip','nama_perawat','no_hp','gender'];
}
