<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKelas;

class Kelas extends BaseController
{
    private $ModelKelas;
    public function __construct() {
        helper('form');
        $this->ModelKelas = new ModelKelas;
    }

    public function index()
    {
        $data = [
            'menu' => 'masteranggota',
            'submenu' => 'kelas',
            'judul' => 'Kelas',
            'page'  => 'v_kelas',
            'kelas' => $this->ModelKelas->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        $data = [
            'nama_kelas'=>$this->request->getPost('nama_kelas'),
        ];
        $this->ModelKelas->AddData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('Kelas'));
    }

    public function EditData($id_kelas)
    {
        $data = [
            'id_kelas' => $id_kelas,
            'nama_kelas'=>$this->request->getPost('nama_kelas'),
        ];
        $this->ModelKelas->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate');
        return redirect()->to(base_url('Kelas'));
    }

    public function DeleteData($id_kelas)
    {
        $data = [
            'id_kelas'=> $id_kelas];
        $this->ModelKelas->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('Kelas'));
    }
}
