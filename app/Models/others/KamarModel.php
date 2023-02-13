<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table = 'kamar';
    protected $allowedFields = ['kode_kamar','kode_kelas','nama_kamar','jumlah_bed'];
}
