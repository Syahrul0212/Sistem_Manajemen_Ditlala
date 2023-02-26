<?php
namespace App\Controllers;

//memanggil model
use App\Models\RakModel;

class Rak extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->RakModel = new RakModel();

    }

    public function list()
    {
        //select data from table tb_jenis_barang
        $list = $this->RakModel->select('id, rak_unit, rak_posisi')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('rak_list', $output);
    }

    public function insert()
    {
        //select data from table "" (untuk data di selectbox/dropdown)
        $data_rak = $this->RakModel->select('id, rak_unit, rak_posisi')->findAll();

        $output = [
            'data_rak' => $data_rak,
        ];

        return view('rak_insert', $output);
    }

    public function insert_save()
    {
        $id = $this->request->getVar('id');
        $rak_unit = $this->request->getVar('rak_unit');
        $rak_posisi = $this->request->getVar('rak_posisi');

        $this->RakModel->insert([
            'id' => $id,
            'rak_unit' => $rak_unit,
            'rak_posisi' => $rak_posisi,

        ]);

        return redirect()->to('rak');
    }

    public function update($id)
    {
       //select data kategori yang dipilih (filter by id)
        $data =  $this->RakModel->where('id', $id)->first();

        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_rak = $this->RakModel->select('id, rak_unit, rak_posisi')->findAll();

        $output = [
            'data' => $data,
            'data_rak' => $data_rak
        ];

        return view('rak_update', $output);
    }

    public function update_save($id)
    {
        $rak_unit = $this->request->getVar('rak_unit');
        $rak_posisi = $this->request->getVar('rak_posisi');

        $this->RakModel->update($id, [
            'rak_unit' => $rak_unit,
            'rak_posisi' => $rak_posisi,
        ]);
        return redirect()->to('rak/');
    }

    
    public function delete($id)
    {   
        //delete data table buku filter by id
        $this->RakModel->delete($id);
        return redirect()->to('rak');
    }


}