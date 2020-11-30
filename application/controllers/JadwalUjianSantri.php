<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalUjianSantri extends CI_Controller
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
        $this->load->view('jadwalUjianSantri');
    }
    public function getJadwalUjianSantri()
    {
        $jadwalUjianSantri = $this->JadwalUjianSantriModel->getJadwalUjianSantri();
        echo json_encode($jadwalUjianSantri);
    }

    public function tambahJadwalUjianSantri()
    {
        $data = $_POST;
        $data = $this->JadwalUjianSantriModel->tambahJadwalUjianSantri($data);

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

    public function hapusJadwalUjianSantri()
    {
        $data = $_POST;
        $id = $data['id_jadwal_ujian_calon_santri'];
        $status = $this->JadwalUjianSantriModel->hapusJadwalUjianSantri($id);
        echo $status;
    }

    public function getJadwalUjianSantriById()
    {
        $id_jadwal_ujian_calon_santri = $_POST['id_jadwal_ujian_calon_santri'];
        $data = $this->JadwalUjianSantriModel->getJadwalUjianSantriById($id_jadwal_ujian_calon_santri);
        echo json_encode($data);
    }

    public function updateJadwalUjianSantri()
    {
        $data = $_POST;
        $data = $this->JadwalUjianSantriModel->updateJadwalUjianSantri($data);
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


    public function getListRuangan()
    {
        $listJenisRuangan = $this->RuanganModel->getListRuangan();
        echo json_encode($listJenisRuangan);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_ruangan = $_POST['id_ru'];

        if ($id_ruangan == '' || !isset($id_ruangan)) {
            $data = $this->RuanganModel->insertData($data);
        } else {
            $data = $this->RuanganModel->updateData($data);
        }

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
