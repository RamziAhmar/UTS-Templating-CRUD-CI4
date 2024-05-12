<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table            = 'jabatan';
    protected $primaryKey       = 'id_jabatan';
    protected $allowedFields    = ['nama_jabatan', 'tingkat', 'gaji'];

    public function insertData($data)
    {
        $this->db->table('jabatan')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('jabatan')->where('id_jabatan', $data['id_jabatan'])->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('jabatan')->where('id_jabatan', $data['id_jabatan'])->delete($data);
    }

}
