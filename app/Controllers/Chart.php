<?php

namespace App\Controllers;

//memanggil model
use App\Models\BarangModel;
use App\Models\MerkModel;

class Chart extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->MerkModel = new MerkModel();
    }

    public function pie()
    {
        //select data from table buku
        $list = $this->MerkModel->select('id, nama_merk, jumlah')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('chart_pie', $output);
    }
}
