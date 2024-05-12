<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class SdmModel extends Model
{
    protected $table            = 'sdm';
    protected $primaryKey       = 'id_sdm';
    protected $allowedFields    = ['id_sdm_detail', 'id_jabatan', 'id_status', 'sp'];

    public function getAll()
    {
        $builder = $this->db->table('sdm');
        $builder->join('jabatan', 'jabatan.id_jabatan = sdm.id_jabatan')
        ->join('status', 'status.id_status = sdm.id_status')
        ->join('sdm_detail', 'sdm_detail.id_sdm_detail = sdm.id_sdm_detail');
        $query = $builder->get();

        return $query->getResult();
    }
    public function dosen()
    {
        $builder = $this->db->table('sdm');
        $builder->join('jabatan', 'jabatan.id_jabatan = sdm.id_jabatan')
        ->join('status', 'status.id_status = sdm.id_status')
        ->join('sdm_detail', 'sdm_detail.id_sdm_detail = sdm.id_sdm_detail');
        $query = $builder->getWhere(['nama_jabatan' => 'Dosen']);

        return $query->getResult();
    }

    public function staff()
    {
        $builder = $this->db->table('sdm');
        $builder->join('jabatan', 'jabatan.id_jabatan = sdm.id_jabatan')
        ->join('status', 'status.id_status = sdm.id_status')
        ->join('sdm_detail', 'sdm_detail.id_sdm_detail = sdm.id_sdm_detail');
        $query = $builder->getWhere(['nama_jabatan !=' => 'Dosen']);

        return $query->getResult();
    }
    public function sdmAktifRow()
    {
        $builder = $this->db->table('sdm');
        $builder->join('jabatan', 'jabatan.id_jabatan = sdm.id_jabatan')
        ->join('status', 'status.id_status = sdm.id_status')
        ->join('sdm_detail', 'sdm_detail.id_sdm_detail = sdm.id_sdm_detail');
        $query = $builder->getWhere(['nama_status !=' => 'Melamar']);

        return $query->getNumRows();
    }
    public function dosenRow()
    {
        $builder = $this->db->table('sdm');
        $builder->join('jabatan', 'jabatan.id_jabatan = sdm.id_jabatan')
        ->join('status', 'status.id_status = sdm.id_status')
        ->join('sdm_detail', 'sdm_detail.id_sdm_detail = sdm.id_sdm_detail');
        $query = $builder->getWhere(['nama_jabatan' => 'Dosen', 'nama_status !=' => 'Melamar']);

        return $query->getNumRows();
    }
    public function staffRow()
    {
        $builder = $this->db->table('sdm');
        $builder->join('jabatan', 'jabatan.id_jabatan = sdm.id_jabatan')
        ->join('status', 'status.id_status = sdm.id_status')
        ->join('sdm_detail', 'sdm_detail.id_sdm_detail = sdm.id_sdm_detail');
        $query = $builder->getWhere(['nama_jabatan !=' => 'Dosen', 'nama_status !=' => 'Melamar']);

        return $query->getNumRows();
    }

    public function insertData($data)
    {
        $this->db->table('sdm')->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('sdm')->where('id_sdm', $data['id_sdm'])->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('sdm')->where('id_sdm', $data['id_sdm'])->delete($data);
    }

    
}
