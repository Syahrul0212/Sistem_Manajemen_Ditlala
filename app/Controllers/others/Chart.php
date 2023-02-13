<?php

namespace App\Controllers;

//memanggil model
use App\Models\BukuModel;
use App\Models\KategoriModel;

class Chart extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->BukuModel = new BukuModel();
        $this->KategoriModel = new KategoriModel();
    }

    public function pie()
    {
        //select data from table buku
        $list = $this->BukuModel->select('judul, stok')->orderBy('judul')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('chart_pie', $output);
    }
    public function line()
    {
        //select data from table buku
        $list = $this->BukuModel->select('judul, stok')->orderBy('judul')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('chart_line', $output);
    }

    public function pieKategori()
    {
        //select data from table buku
        $list = $this->BukuModel->select('kategori.nama, SUM(buku.stok) AS stok')->join('kategori', 'buku.kategori_id = kategori.id')->groupBy('nama')->orderBy('nama')->findAll();
        $output = [
            'list' => $list,
        ];

        return view('chart_pieKategori', $output);
    }
}
