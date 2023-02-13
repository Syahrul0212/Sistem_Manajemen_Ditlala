<?php
namespace App\Controllers;

//memanggil model
use App\Models\PengadaanModel;

class Pengadaan extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->PengadaanModel = new PengadaanModel();

    }

    public function list()
    {
        //select data from table tb_jenis_barang
        $list = $this->PengadaanModel->select('id, pengadaan, tahun, laporan')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('pengadaan_list', $output);
    }

    public function insert()
    {
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_pengadaan = $this->PengadaanModel->select('id, pengadaan, tahun, laporan')->findAll();

        $output = [
            'data_pengadaan' => $data_pengadaan,
        ];

        return view('pengadaan_insert', $output);
    }

    public function insert_save()
    {
        $id = $this->request->getVar('id');
        $nama_barang = $this->request->getVar('pengadaan');
        $jumlah = $this->request->getVar('tahun');
        $warranty = $this->request->getVar('laporan');

        $this->PengadaanModel->insert([
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
        $data =  $this->PengadaanModel->where('id', $id)->first();

        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_barang = $this->PengadaanModel->select('id, nama_barang, jumlah, warranty, serial_number')->findAll();

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

        $this->PengadaanModel->update($id, [
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
        $this->PengadaanModel->delete($id);
        return redirect()->to('barang');
    }

}