<?php
namespace App\Controllers;

//memanggil model
use App\Models\BarangModel;

class Barang extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->BarangModel = new BarangModel();

    }

    public function list()
    {
        //select data from table tb_jenis_barang
        $list = $this->BarangModel->select('id, nama_barang, jumlah, warranty, serial_number')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('barang_list', $output);
    }

    public function insert()
    {
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_barang = $this->BarangModel->select('id, nama_barang, jumlah, warranty, serial_number')->findAll();

        $output = [
            'data_barang' => $data_barang,
        ];

        return view('barang_insert', $output);
    }

    public function insert_save()
    {
        $id = $this->request->getVar('id');
        $nama_barang = $this->request->getVar('nama_barang');
        $jumlah = $this->request->getVar('jumlah');
        $warranty = $this->request->getVar('warranty');
        $serial_number = $this->request->getVar('serial_number');

        $this->BarangModel->insert([
            'id' => $id,
            'nama_barang' => $nama_barang,
            'jumlah' => $jumlah,
            'warranty' => $warranty,
            'serial_number' => $serial_number,

        ]);

        return redirect()->to('barang');
    }

    public function update($id)
    {
       //select data kategori yang dipilih (filter by id)
        $data =  $this->BarangModel->where('id', $id)->first();

        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_barang = $this->BarangModel->select('id, nama_barang, jumlah, warranty, serial_number')->findAll();

        $output = [
            'data' => $data,
            'data_barang' => $data_barang,
        ];

        return view('barang_update', $output);
    }

    public function update_save($id)
    {

        $nama_barang = $this->request->getVar('nama_barang');
        $jumlah = $this->request->getVar('jumlah');
        $warranty = $this->request->getVar('warranty');
        $serial_number = $this->request->getVar('serial_number');

        $this->BarangModel->update($id, [
            'nama_barang' => $nama_barang,
            'jumlah' => $jumlah,
            'warranty' => $warranty,
            'serial_number' => $serial_number,
        ]);

        return redirect()->to('barang/');
    }

    
    public function delete($id)
    {   
        //delete data table buku filter by id
        $this->BarangModel->delete($id);
        return redirect()->to('barang');
    }

}