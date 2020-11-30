<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('RuanganModel');
    // }
    public function index()
    {
        $this->load->view('calonSantri');
    }





    
    // FUNGSI DIBAWAH INI YANG DIPAKE UNTUK JOIN 3 TABEL
    public function getSantri()
    {
        $Santri = $this->SantriModel->getSantri();
        echo json_encode($Santri);
    }
    // FUNGSI DIATAS INI YANG DIPAKE UNTUK JOIN 3 
    

    public function getProgram()
    {
        $Santri = $this->SantriModel->getTabelJoinProgram();
        echo json_encode($Santri);
    }



    public function tambahSantri()
    {
        $data = $_POST;
        $data = $this->SantriModel->tambahSantri($data);

        if ($data) {
            $status = 1;
        } else {
            $status = 0;
        }

        $res = array(
            "data" => $data,
            "status" => $status
        );
        // print_r($res);
        echo json_encode($res);
    }

    public function hapusSantri()
    {
        $data = $_POST;
        $id = $data['id_santri'];
        $status = $this->SantriModel->hapusSantri($id);
        echo $status;
    }

    public function getSantriById()
    {
        $id_jadwal_ujian_calon_santri = $_POST['id_santri'];
        $data = $this->SantriModel->getSantriById($id_jadwal_ujian_calon_santri);
        echo json_encode($data);
    }

    public function updateSantri()
    {
        $data = $_POST;
        $data = $this->SantriModel->updateSantri($data);
        if ($data) {
            $status = 1;
            // close session
            // $this->session->unset_userdata('sekolah_id');
        } else {
            $status = 0;
        }

        $res = array(
            "data" => $data,
            "status" => $status
        );

        echo json_encode($res);
    }
}
