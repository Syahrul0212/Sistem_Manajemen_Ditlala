<?php

namespace App\Controllers;

//memanggil model
use App\Models\MerkModel;

class Merk extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->MerkModel = new MerkModel();
    }

    public function list()
    {
        //select data from table kategori
        $list = $this->MerkModel->select('id, nama')->orderBy('nama')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('merk_list', $output);
    }

    public function insert()
    {
        return view('merk_insert');
    }

    public function insert_save()
    {
        $nama = $this->request->getVar('nama');

        //insert data ke table kategori
        $this->MerkModel->insert([
            'nama' => $nama,
        ]);

        return redirect()->to('merk');
    }

    public function update($id)
    {
        //select data kategori yang dipilih (filter by id)
        $data =  $this->MerkModel->where('id', $id)->first();

        $output = [
            'data' => $data,
        ];

        return view('merk_update', $output);
    }

    public function update_save($id)
    {
        $nama = $this->request->getVar('nama');

        //update data ke table kategori filter by id
        $this->MerkModel->update($id, [
            'nama' => $nama,
        ]);

        return redirect()->to('merk/');
    }

    public function delete($id)
    {
        //delete data table kategori filter by id
        $this->MerkModel->delete($id);
        return redirect()->to('merk');
    }
}
