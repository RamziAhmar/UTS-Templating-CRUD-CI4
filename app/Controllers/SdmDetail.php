<?php

namespace App\Controllers;

use App\Models\SdmDetailModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SdmDetail extends BaseController
{
    protected $sdmDetail;
    
    public function __construct()
    {
        $this->sdmDetail = new SdmDetailModel();
    }
    public function index()
    {
        $session = session();

        $data = [
            'parent' => 'Master',
            'title' => 'SDM Detail',
            'sdmDetail' => $this->sdmDetail->findAll(),
            'username' => $session->get('username')

        ];
        return view('v_sdm_detail',$data);
    }
    
    public function insertData()
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'email' => $this->request->getPost('email')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        $this->sdmDetail->insertData($data);
        return redirect()->to('sdm_detail');
    }
    public function updateData($id_sdm_detail)
    {
        $data = [
            'id_sdm_detail' => $id_sdm_detail,
            'nama' => $this->request->getPost('nama'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'email' => $this->request->getPost('email')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
        $this->sdmDetail->updateData($data);
        return redirect()->to('sdm_detail');
    }
    public function deleteData($id_sdm_detail)
    {
        $data = [
            'id_sdm_detail' => $id_sdm_detail

        ];

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        $this->sdmDetail->deleteData($data);
        return redirect()->to('sdm_detail');
    }
    
}
