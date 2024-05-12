<?php

namespace App\Controllers;

use App\Models\SdmModel;
use App\Models\StatusModel;
use App\Models\JabatanModel;
use App\Models\SdmDetailModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Sdm extends BaseController
{
    protected $sdm;
    protected $sdmDetail;
    protected $jabatan;
    protected $status;
    
    public function __construct()
    {
        $this->sdm = new SdmModel();
        $this->sdmDetail = new SdmDetailModel();
        $this->jabatan = new JabatanModel();
        $this->status = new StatusModel();
    }
    public function index()
    {
        $session = session();

        $data = [
            'parent' => '',
            'title' => 'SDM',
            'sdm' => $this->sdm->getAll(),
            'sdm_detail' => $this->sdmDetail->findAll(),
            'status' => $this->status->findAll(),
            'jabatan' => $this->jabatan->findAll(),
            'username' => $session->get('username')
            
        ];
        return view('v_sdm',$data);
    }
    public function dosen()
    {
        $session = session();

        $data = [
            'parent' => '',
            'title' => 'Dosen',
            'dosen' => $this->sdm->dosen(),
            'sdm_detail' => $this->sdmDetail->findAll(),
            'status' => $this->status->findAll(),
            'jabatan' => $this->jabatan->findAll(),
            'username' => $session->get('username')
            
        ];
        return view('v_dosen',$data);
    }
    public function staff()
    {
        $session = session();

        $data = [
            'parent' => '',
            'title' => 'Staff',
            'staff' => $this->sdm->staff(),
            'sdm_detail' => $this->sdmDetail->findAll(),
            'status' => $this->status->findAll(),
            'jabatan' => $this->jabatan->findAll(),
            'username' => $session->get('username')
            
        ];
        return view('v_staff',$data);
    }

    public function insertData()
    {
        $data = [
            'id_sdm_detail' => $this->request->getPost('id_sdm_detail'),
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'id_status' => $this->request->getPost('id_status')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        $this->sdm->insertData($data);
        return redirect()->to('sdm');
    }
    public function tambahSP($id_sdm)
    {
        $data = [
            'id_sdm' => $id_sdm,
            'sp' => $this->request->getPost('sp')
        ];

        session()->setFlashdata('pesan', 'SP Berhasil Ditambahkan!!');
        $this->sdm->updateData($data);
        return redirect()->to('sdm');
    }
    public function updateData($id_sdm)
    {
        $data = [
            'id_sdm' => $id_sdm,
            'id_sdm_detail' => $this->request->getPost('id_sdm_detail'),
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'id_status' => $this->request->getPost('id_status')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
        $this->sdm->updateData($data);
        return redirect()->to('sdm');
    }
    public function deleteData($id_sdm)
    {
        $data = [
            'id_sdm' => $id_sdm
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        $this->sdm->deleteData($data);
        return redirect()->to('sdm');
    }
}
