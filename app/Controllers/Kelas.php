<?php

namespace App\Controllers;

//memanggil model
use App\Models\KelasModel;

class Kelas extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->KelasModel = new KelasModel();
    }

    public function list()
    {
        //select data from table buku
        $list = $this->KelasModel->select('kode_kelas,nama_kelas,harga_per_malam,fasilitas')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('kelas_list', $output);
    }

    public function insert()
    {
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_kelas = $this->KelasModel->orderBy('nama_kelas')->findAll();

        $output = [
            'data_kelas' => $data_kelas,
        ];

        return view('kelas_insert', $output);
    }

    public function insert_save()
    {
        $kode_kelas = $this->request->getVar('kode_kelas');
        $nama_kelas = $this->request->getVar('nama_kelas');
        $harga_per_malam = $this->request->getVar('harga_per_malam');
        $fasilitas = $this->request->getVar('fasilitas');

        //insert data ke table buku
        $this->KelasModel->insert([
            'kode_kelas' => $kode_kelas,
            'nama_kelas' => $nama_kelas,
            'harga_per_malam' => $harga_per_malam,
            'fasilitas' => $fasilitas,

        ]);

        return redirect()->to('kelas');
    }

    public function update($kode_kelas)
    {
        //select data kategori yang dipilih (filter by id)
        $data =  $this->KelasModel->where('kode_kelas', $kode_kelas)->first();

        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_kelas = $this->KelasModel->orderBy('nama_kelas')->findAll();

        $output = [
            'data' => $data,
            'data_kelas' => $data_kelas,
        ];

        return view('kelas_update', $output);
    }

    public function update_save($kode_kelas)
    {
        $kode_kelas = $this->request->getVar('kode_kelas');
        $nama_kelas = $this->request->getVar('nama_kelas');
        $harga_per_malam = $this->request->getVar('harga_per_malam');
        $fasilitas = $this->request->getVar('fasilitas');

        //update data ke table buku filter by id
        $this->KelasModel->update($kode_kelas, [
            'kode_kelas' => $kode_kelas,
            'nama_kelas' => $nama_kelas,
            'harga_per_malam' => $harga_per_malam,
            'fasilitas' => $fasilitas,
        ]);
    }

    // public function update_save($id)
    // {
    //     $kategori_id = $this->request->getVar('kategori_id');
    //     $judul = $this->request->getVar('judul');

    //     //update data ke table buku filter by id
    //     $this->BukuModel->update($id, [
    //         'kategori_id' => $kategori_id,
    //         'judul' => $judul,
    //     ]);

    //     return redirect()->to('buku/');
    // }

    // public function delete($id)
    // {
    //     //delete data table buku filter by id
    //     $this->BukuModel->delete($id);
    //     return redirect()->to('buku');
    // }
}
