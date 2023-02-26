<?php
namespace App\Models;
use CodeIgniter\Model;

class RakModel extends Model
{
    protected $table = 'tb_rak';
    protected $allowedFields = ['id', 'rak_unit', 'rak_posisi'];
}