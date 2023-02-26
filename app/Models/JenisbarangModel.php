<?php
namespace App\Models;
use CodeIgniter\Model;

class JenisbarangModel extends Model
{
    protected $table = 'tb_jenisbarang';
    protected $allowedFields = ['merk_id', 'jenisbarang', 'tipe', 'pengadaan', 'warranty', 'jumlah', 'rakposisi', 'rakunit', 'serialnumber', 'ip'];
}