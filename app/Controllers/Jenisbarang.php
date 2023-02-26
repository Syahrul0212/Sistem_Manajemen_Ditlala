<?php

namespace App\Controllers;

//memanggil model
use App\Models\JenisbarangModel;
use App\Models\MerkModel;

class Jenisbarang extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->JenisbarangModel = new JenisbarangModel();
        $this->MerkModel = new MerkModel();
    }

    public function list()
    {
        //select data from table buku
        $list = $this->JenisbarangModel->select('tb_jenisbarang.id, jenisbarang, tipe, pengadaan, warranty, jumlah, rakposisi, rakunit, serialnumber, ip, tb_merk.nama AS tb_merk_nama')->join('tb_merk', 'tb_jenisbarang.merk_id = tb_merk.id')->orderBy('tb_merk.id')->findAll();
        // dd($list);
        $output = [
            'list' => $list,
        ];

        return view('jenisbarang_list', $output);
    }

    public function insert()
    {
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_merk = $this->MerkModel->orderBy('nama')->findAll();

        $output = [
            'data_merk' => $data_merk,
        ];

        return view('jenisbarang_insert', $output);
    }

    public function insert_save()
    {
        $id = $this->request->getVar('id');
        $merk_id = $this->request->getVar('merk_id');
        $jenisbarang = $this->request->getVar('jenisbarang');
        $tipe = $this->request->getVar('tipe');
        $pengadaan = $this->request->getVar('pengadaan');
        $warranty = $this->request->getVar('warranty');
        $jumlah = $this->request->getVar('jumlah');
        $rakposisi = $this->request->getVar('rakposisi');
        $rakunit = $this->request->getVar('rakunit');
        $serialnumber = $this->request->getVar('serialnumber');
        $ip = $this->request->getVar('ip');

        //insert data ke table buku
        $this->JenisbarangModel->insert([
            'id' => $id,
            'merk_id' => $merk_id,
            'jenisbarang' => $jenisbarang,
            'tipe' => $tipe,
            'pengadaan' => $pengadaan,
            'warranty' => $warranty,
            'jumlah' => $jumlah,
            'rakposisi' => $rakposisi,
            'rakunit' => $rakunit,
            'serialnumber' => $serialnumber,
            'ip' => $ip,
        ]);

        return redirect()->to('jenisbarang');
    }

    public function update($id)
    {
        //select data kategori yang dipilih (filter by id)
        $data =  $this->JenisbarangModel->where('id', $id)->first();

        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_merk = $this->MerkModel->orderBy('nama')->findAll();

        $output = [
            'data' => $data,
            'data_merk' => $data_merk,
        ];

        return view('jenisbarang_update', $output);
    }

    public function update_save($id)
    {
        // $id = $this->request->getVar('id');
        $merk_id = $this->request->getVar('merk_id');
        $jenisbarang = $this->request->getVar('jenisbarang');
        $tipe = $this->request->getVar('tipe');
        $pengadaan = $this->request->getVar('pengadaan');
        $warranty = $this->request->getVar('warranty');
        $jumlah = $this->request->getVar('jumlah');
        $rakposisi = $this->request->getVar('rakposisi');
        $rakunit = $this->request->getVar('rakunit');
        $serialnumber = $this->request->getVar('serialnumber');
        $ip = $this->request->getVar('ip');
        // dd($this);
        //update data ke table jenis barang
        $this->JenisbarangModel->update( $id, [
            
           
            'merk_id' => $merk_id,
            'jenisbarang' => $jenisbarang,
            'tipe' => $tipe,
            'pengadaan' => $pengadaan,
            'warranty' => $warranty,
            'jumlah' => $jumlah,
            'rakposisi' => $rakposisi,
            'rakunit' => $rakunit,
            'serialnumber' => $serialnumber,
            'ip' => $ip,
        ]);

        return redirect()->to('jenisbarang/');
    }

    public function delete($id)
    {
        //delete data table buku filter by id
        $this->JenisbarangModel->delete($id);
        return redirect()->to('jenisbarang');
    }
}
