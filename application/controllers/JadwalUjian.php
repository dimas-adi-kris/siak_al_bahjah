<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalUjian extends CI_Controller
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
        $this->load->view('jadwalUjian');
    }


    public function getJadwalUjian()
    {
        $dataProgram = $this->JadwalUjianModel->getJadwalUjian();
        echo json_encode($dataProgram);
    }

    public function tambahJadwalUjian()
    {
        $data = $_POST;
        $data = $this->JadwalUjianModel->tambahJadwalUjian($data);

        if ($data) {
            $status = 1;
        } else {
            $status = 0;
        }

        $res = array(
            "data" => $data,
            "status" => $status
        );

        echo json_encode($res);
    }

    public function hapusJadwalUjian()
    {
        $data = $_POST['id_jadwal_ujian'];
        $status = $this->JadwalUjianModel->hapusJadwalUjian($data);
        echo $status;
    }

    public function getJadwalUjianById()
    {
        $id_jadwal_ujian = $_POST['id_jadwal_ujian'];
        $data = $this->JadwalUjianModel->getJadwalUjianById($id_jadwal_ujian);
        echo json_encode($data);
    }

    public function updateJadwalUjian()
    {
        $data = $_POST;
        $data = $this->JadwalUjianModel->updateJadwalUjian($data);
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
