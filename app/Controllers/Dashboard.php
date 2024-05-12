<?php

namespace App\Controllers;

use App\Models\SdmModel;
use App\Models\UserModel;
use App\Models\StatusModel;
use App\Models\JabatanModel;
use App\Models\SdmDetailModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $status;
    protected $jabatan;
    protected $sdm;
    protected $sdmDetail;

    public function __construct()
    {
        $this->status = new StatusModel();
        $this->jabatan = new JabatanModel();
        $this->sdmDetail = new SdmDetailModel();
        $this->user = new UserModel();
        $this->sdm = new SdmModel();
    }
    public function index()
    {
        $session = session();

        $data = [
            'parent' => '',
            'title' => 'Dashboard',
            'jabatan' => $this->jabatan->get()->resultID->num_rows,
            'sdmDetail' => $this->sdm->get()->resultID->num_rows,
            'sdm' => $this->sdm->sdmAktifRow(),
            'dosen' => $this->sdm->dosenRow(),
            'staff' => $this->sdm->staffRow(),
            'username' => $session->get('username')
        ];
        return view('v_dashboard', $data);
    }
}
