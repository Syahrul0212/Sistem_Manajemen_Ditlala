<?php

namespace App\Controllers;

//memanggil model
use App\Models\PerawatModel;

class Perawat extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->PerawatModel = new PerawatModel();
    }

    public function list()
    {
        //select data from table buku
        $list = $this->PerawatModel->select('nip, nama_perawat, no_hp, gender')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('perawat_list', $output);
    }

    public function insert()
    {
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_perawat = $this->PerawatModel->orderBy('nama_perawat')->findAll();

        $output = [
            'data_perawat' => $data_perawat,
        ];

        return view('perawat_insert', $output);
    }

    public function insert_save()
    {
        $nip = $this->request->getVar('nip');
        $nama_perawat = $this->request->getVar('nama_perawat');
        $no_hp = $this->request->getVar('no_hp');
        $gender = $this->request->getVar('gender');

        //insert data ke table buku
        $this->PerawatModel->insert([
            'nip' => $nip,
            'nama_perawat' => $nama_perawat,
            'no_hp' => $no_hp,
            'gender' => $gender,
        ]);

        return redirect()->to('perawat');
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
