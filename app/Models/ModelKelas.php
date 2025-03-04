<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_kelas')
            ->orderBy('id_kelas', 'ASC')
            ->get()->getResultArray();
    }

    public function AddData($data)
    {
        $this->db->table('tbl_kelas')->insert($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->delete($data);
    }

    public function EditData($data)
    {
        $this->db->table('tbl_kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->update($data);
    }
}
