<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Jabatan extends BaseController
{
    protected $jabatan;
    
    public function __construct()
    {
        $this->jabatan = new JabatanModel();
    }

    public function index()
    {
        $session = session();

        $data = [
            'parent' => 'Master',
            'title' => 'Jabatan',
            'jabatan' => $this->jabatan->findAll(),
            'username' => $session->get('username')

        ];
        return view('v_jabatan',$data);
    }

    public function insertData()
    {
        $data = [
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'tingkat' => $this->request->getPost('tingkat'),
            'gaji' => $this->request->getPost('gaji')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        $this->jabatan->insertData($data);
        return redirect()->to('jabatan');
    }
    
    public function updateData($id_jabatan)
    {
        $data = [
            'id_jabatan' => $id_jabatan,
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'tingkat' => $this->request->getPost('tingkat'),
            'gaji' => $this->request->getPost('gaji')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
        $this->jabatan->updateData($data);
        return redirect()->to('jabatan');
    }
    
    public function deleteData($id_jabatan)
    {
        $data = [
            'id_jabatan' => $id_jabatan
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        $this->jabatan->deleteData($data);
        return redirect()->to('jabatan');
    }
}
