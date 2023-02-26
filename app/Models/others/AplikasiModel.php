<?php
namespace App\Models;
use CodeIgniter\Model;

class AplikasiModel extends Model
{
    protected $table = 'tb_aplikasi';
    protected $allowedFields = ['id', 'nama_aplikasi', 'username', 'password'];
}