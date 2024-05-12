<?php

namespace App\Models;

use CodeIgniter\Model;

class SdmDetailModel extends Model
{
    protected $table            = 'sdm_detail';
    protected $primaryKey       = 'sdm_detail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'tempat_lahir', 'tanggal_lahir', 'tanggal_lahir', 'no_telepon', 'email'];

    public function insertData($data)
    {
        $this->db->table('sdm_detail')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('sdm_detail')->where('id_sdm_detail', $data['id_sdm_detail'])->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('sdm_detail')->where('id_sdm_detail', $data['id_sdm_detail'])->delete($data);
    }
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
