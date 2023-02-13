<?php

namespace App\Controllers;

//memanggil model
use App\Models\KamarModel;
use App\Models\KelasModel;

class Kamar extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->KamarModel = new KamarModel();
        $this->KelasModel = new KelasModel();
    }

    public function list()
    {
        //select data from table buku
        $list = $this->KamarModel->select('kode_kamar, kode_kelas, nama_kamar, jumlah_bed')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('kamar_list', $output);
    }

    public function insert()
    {
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_kamar = $this->KamarModel->orderBy('nama_kamar')->findAll();
        $data_kelas = $this->KelasModel->orderBy('nama_kelas')->findAll();

        $output = [
            'data_kamar' => $data_kamar,
            'data_kelas' => $data_kelas,
        ];

        return view('kamar_insert', $output);
    }

    public function insert_save()
    {
        $kode_kamar = $this->request->getVar('kode_kamar');
        $kode_kelas = $this->request->getVar('kode_kelas');
        $nama_kamar = $this->request->getVar('nama_kamar');
        $jumlah_bed = $this->request->getVar('jumlah_bed');

        //insert data ke table buku
        $this->KamarModel->insert([
            'kode_kamar' => $kode_kamar,
            'kode_kelas' => $kode_kelas,
            'nama_kamar' => $nama_kamar,
            'jumlah_bed' => $jumlah_bed,
        ]);

        return redirect()->to('kamar');
    }

    public function update($id)
    {
        //select data kategori yang dipilih (filter by id)
        $data =  $this->BukuModel->where('id', $id)->first();

        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_kategori = $this->KategoriModel->orderBy('nama')->findAll();

        $output = [
            'data' => $data,
            'data_kategori' => $data_kategori,
        ];

        return view('buku_update', $output);
    }

    public function update_save($id)
    {
        $kategori_id = $this->request->getVar('kategori_id');
        $judul = $this->request->getVar('judul');

        //update data ke table buku filter by id
        $this->BukuModel->update($id, [
            'kategori_id' => $kategori_id,
            'judul' => $judul,
        ]);

        return redirect()->to('buku/');
    }

    public function delete($id)
    {
        //delete data table buku filter by id
        $this->BukuModel->delete($id);
        return redirect()->to('buku');
    }
}
