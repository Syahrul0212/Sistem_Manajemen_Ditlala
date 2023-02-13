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
        //select data from table tb_jenis_barang
        $list = $this->MerkModel->select('id, nama_merk, jumlah')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('merk_list', $output);
    }

    public function insert()
    {
        //select data from table "" (untuk data di selectbox/dropdown)
        $data_merk = $this->MerkModel->select('id, nama_merk, jumlah')->findAll();

        $output = [
            'data_merk' => $data_merk,
        ];

        return view('merk_insert', $output);
    }

    public function insert_save()
    {
        $id = $this->request->getVar('id');
        $nama_merk = $this->request->getVar('nama_merk');
        $jumlah = $this->request->getVar('jumlah');

        $this->MerkModel->insert([
            'id'        => $id,
            'nama_merk' => $nama_merk,
            'jumlah'    => $jumlah,

        ]);

        return redirect()->to('merk');
    }

    public function update($id)
    {
       //select data kategori yang dipilih (filter by id)
        $data =  $this->MerkModel->where('id', $id)->first();

        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_merk = $this->MerkModel->select('id, nama_merk, jumlah')->findAll();

        $output = [
            'data' => $data,
            'data_merk' => $data_merk,
        ];

        return view('merk_update', $output);
    }

    public function update_save($id)
    {
        $nama_merk = $this->request->getVar('nama_merk');
        $jumlah = $this->request->getVar('jumlah');

        $this->MerkModel->update($id, [
            'nama_merk' => $nama_merk,
            'jumlah'    => $jumlah,
            
        ]);

        return redirect()->to('merk/');
    }

    
    public function delete($id)
    {   
        //delete data table buku filter by id
        $this->MerkModel->delete($id);
        return redirect()->to('merk');
    }


}