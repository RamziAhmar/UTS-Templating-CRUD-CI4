<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Publisher\Exceptions\PublisherException;

class Auth extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = new UserModel;
    }
    public function index()
    {
        return view('v_login');
    }

    public function process()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));
        $data = $this->user->where('username', $username)->first();

        if ($data) {
            $pass_db = $data['password'];
            if ($password == $pass_db) {
                $session_data = [
                    'username' => $data['username'],
                    'logged_in' => TRUE
                ];
                $session->set($session_data);
                return redirect()->to('dashboard');
            } else {
                session()->setFlashdata('pesan', 'Username atau password salah!');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('pesan', 'Username atau password salah!');
            return redirect()->to('/');
        }
    }

    Public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
