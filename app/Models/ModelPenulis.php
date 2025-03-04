<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenulis extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_penulis')
            ->orderBy('id_penulis', 'DESC')
            ->get()->getResultArray();
    }

    public function AddData($data)
    {
        $this->db->table('tbl_penulis')->insert($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_penulis')
            ->where('id_penulis', $data['id_penulis'])
            ->delete($data);
    }

    public function EditData($data)
    {
        $this->db->table('tbl_penulis')
            ->where('id_penulis', $data['id_penulis'])
            ->update($data);
    }
}
