<?php
namespace App\Models;
use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'tb_barang';
    protected $allowedFields = ['id', 'nama_barang', 'jumlah', 'warranty', 'serial_number'];
}