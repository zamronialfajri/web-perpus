<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRak;

class Rak extends BaseController
{
    private $ModelRak;
    public function __construct() {
        helper('form');
        $this->ModelRak = new ModelRak;
    }

    public function index()
    {
        $data = [
            'menu' => 'masterdata',
            'submenu' => 'rak',
            'judul' => 'Rak',
            'page'  => 'v_rak',
            'rak' => $this->ModelRak->AllData(),
        ];
        return view('v_template_admin', $data);
    }

    public function AddData()
    {
        $data = [
            'nama_rak'=>$this->request->getPost('nama_rak'),
            'lantai_rak'=>$this->request->getPost('lantai_rak')
        ];
        $this->ModelRak->AddData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to(base_url('Rak'));
    }

    public function EditData($id_rak)
    {
        $data = [
            'id_rak' => $id_rak,
            'nama_rak'=>$this->request->getPost('nama_rak'),
            'lantai_rak'=>$this->request->getPost('lantai_rak')
        ];
        $this->ModelRak->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate');
        return redirect()->to(base_url('Rak'));
    }

    public function DeleteData($id_rak)
    {
        $data = [
            'id_rak'=> $id_rak];
        $this->ModelRak->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('Rak'));
    }
}
