<?php
namespace App\Controllers;

//memanggil model
use App\Models\AplikasiModel;

class Aplikasi extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->AplikasiModel = new AplikasiModel();

    }

    public function list()
    {
        //select data from table tb_jenis_aplikasi
        $list = $this->AplikasiModel->select('id, nama_aplikasi, username, password')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('aplikasi_list', $output);
    }

    public function insert()
    {
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_aplikasi = $this->AplikasiModel->select('id, nama_aplikasi, username, password')->findAll();

        $output = [
            'data_aplikasi' => $data_aplikasi,
        ];

        return view('aplikasi_insert', $output);
    }

    public function insert_save()
    {
        $id = $this->request->getVar('id');
        $nama_aplikasi = $this->request->getVar('nama_aplikasi');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $this->AplikasiModel->insert([
            'id' => $id,
            'nama_aplikasi' => $nama_aplikasi,
            'username' => $username,
            'password' => $password,

        ]);

        return redirect()->to('aplikasi');
    }

    public function update($id)
    {
       //select data kategori yang dipilih (filter by id)
        $data =  $this->AplikasiModel->where('id', $id)->first();

        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_aplikasi = $this->AplikasiModel->select('id, nama_aplikasi, username, password')->findAll();

        $output = [
            'data' => $data,
            'data_aplikasi' => $data_aplikasi,
        ];

        return view('aplikasi_update', $output);
    }

    public function update_save($id)
    {

        $id = $this->request->getVar('id');
        $nama_aplikasi = $this->request->getVar('nama_aplikasi');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $this->AplikasiModel->update([
            'id' => $id,
            'nama_aplikasi' => $nama_aplikasi,
            'username'      => $username,
            'password'      => $password,
        ]);

        return redirect()->to('aplikasi/');
    }

    
    public function delete($id)
    {   
        //delete data table buku filter by id
        $this->AplikasiModel->delete($id);
        return redirect()->to('aplikasi');
    }

}