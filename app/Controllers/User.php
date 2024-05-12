<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    protected $user;
    
    public function __construct()
    {
        $this->user = new UserModel();
    }
    public function index()
    {
        $session = session();
        $data = [
            'parent' => 'Master',
            'title' => 'User',
            'user' => $this->user->findAll(),
            'username' => $session->get('username')

        ];
        return view('v_user',$data);
    }

    public function insertData()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'akses' => $this->request->getPost('akses')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        $this->user->insertData($data);
        return redirect()->to('user');
    }

    public function updateData($id_user)
    {
        $data = [
            'id_user' => $id_user,
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'akses' => $this->request->getPost('akses')
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
        $this->user->updateData($data);
        return redirect()->to('user');
    }

    public function deleteData($id_user)
    {
        $data = [
            'id_user' => $id_user,
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        $this->user->deleteData($data);
        return redirect()->to('user');
    }
    
}
