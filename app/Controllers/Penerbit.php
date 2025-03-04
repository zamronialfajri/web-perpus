<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ModelPenerbit;

class Penerbit extends BaseController
{
    private $ModelPenerbit;
    public function __construct() {
        helper('form');
        $this->ModelPenerbit = new ModelPenerbit;
    }

    public function index()
    {
        $data = [
            'menu' => 'masterbuku',
            'submenu' => 'penerbit',
            'judul' => 'Penerbit',
            'page'  => 'v_penerbit',
            'penerbit' => $this->ModelPenerbit->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        $data = [
            'nama_penerbit'=>$this->request->getPost('nama_penerbit')
        ];
        $this->ModelPenerbit->AddData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('Penerbit'));
    }

    public function EditData($id_penerbit)
    {
        $data = [
            'id_penerbit' => $id_penerbit,
            'nama_penerbit'=>$this->request->getPost('nama_penerbit')
        ];
        $this->ModelPenerbit->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate');
        return redirect()->to(base_url('Penerbit'));
    }

    public function DeleteData($id_penerbit)
    {
        $data = [
            'id_penerbit' => $id_penerbit,
        ];
        $this->ModelPenerbit->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('Penerbit'));
    }
}
