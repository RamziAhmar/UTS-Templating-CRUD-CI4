<?php

namespace App\Controllers;

use App\Models\StatusModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Status extends BaseController
{
    protected $status;
    
    public function __construct()
    {
        $this->status = new StatusModel();
    }

    public function index()
    {
        $session = session();

        $data = [
            'parent' => 'Master',
            'title' => 'Status',
            'status' => $this->status->findAll(),
            'username' => $session->get('username')

        ];
        return view('v_status',$data);
    }

    public function insertData()
    {
        $data = [
            'id_status' => $this->request->getPost('id_status'),
            'nama_status' => $this->request->getPost('nama_status')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        $this->status->insertData($data);
        return redirect()->to('status');
    }
    public function updateData($id_status)
    {
        $data = [
            'id_status' => $id_status,
            'nama_status' => $this->request->getPost('nama_status')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
        $this->status->updateData($data);
        return redirect()->to('status');
    }

    public function deleteData($id_status)
    {
        $data = [
            'id_status' => $id_status,
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        $this->status->deleteData($data);
        return redirect()->to('status');
    }
    
    
}
