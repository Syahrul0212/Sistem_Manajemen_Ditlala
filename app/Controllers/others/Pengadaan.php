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
        $pengadaan = $this->request->getVar('pengadaan');
        $tahun = $this->request->getVar('tahun');
        $laporan = $this->request->getVar('laporan');

        $this->PengadaanModel->insert([
            'id' => $id,
            'pengadaan' => $pengadaan,
            'tahun' => $tahun,
            'laporan' => $laporan,

        ]);

        return redirect()->to('pengadaan');
    }

    public function update($id)
    {
       //select data kategori yang dipilih (filter by id)
        $data =  $this->PengadaanModel->where('id', $id)->first();

        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_pengadaan = $this->PengadaanModel->select('id, pengadaan, tahun, laporan')->findAll();

        $output = [
            'data' => $data,
            'data_pengadaan' => $data_pengadaan,
        ];

        return view('pengadaan_update', $output);
    }

    public function update_save($id)
    {

        $id = $this->request->getVar('id');
        $pengadaan = $this->request->getVar('pengadaan');
        $tahun = $this->request->getVar('tahun');
        $laporan = $this->request->getVar('laporan');

        $this->PengadaanModel->update([
            'id' => $id,
            'pengadaan' => $pengadaan,
            'tahun' => $tahun,
            'laporan' => $laporan,

        ]);

        return redirect()->to('pengadaan/');
    }

    
    public function delete($id)
    {   
        //delete data table buku filter by id
        $this->PengadaanModel->delete($id);
        return redirect()->to('pengadaan');
    }

}