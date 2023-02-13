<?php
namespace App\Models;
use CodeIgniter\Model;

class PengadaanModel extends Model
{
    protected $table = 'tb_pengadaan';
    protected $allowedFields = ['id', 'pengadaan', 'tahun', 'laporan'];
}