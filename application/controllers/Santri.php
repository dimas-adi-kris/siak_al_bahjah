<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('SantriModel');
    // }
    public function index()
    {
        $this->load->view('santri');
    }

    public function getInfoDasarCalonSantri($id_santri)
    {
        $calon_santri = file_get_contents("http://localhost/al_bahjah/index.php/API/getAPIInfoDasarCalonSantriByID/" . $id_santri);
        echo $calon_santri;
    }

    public function getInfoDataCalonSantri($id_santri)
    {
        $calon_santri = file_get_contents("http://localhost/al_bahjah/index.php/API/getAPIDataCalonSantri/" . $id_santri);
        echo $calon_santri;
    }
    public function getListTabel()
    {
        $listJenisRuangan = $this->SantriModel->getListTabel();
        echo json_encode($listJenisRuangan);
    }
    public function getListTabelJoin()
    {
        $listJenisRuangan = $this->SantriModel->getListTabelJoin();
        echo json_encode($listJenisRuangan);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_santri = $_POST['id_santri'];
        if ($id_santri == '' || !isset($id_santri)) {
            // echo json_encode($id_santri);
            // die;
            $data = $this->SantriModel->insertData($data);
        } else {
            $data = $this->SantriModel->updateData($data);
            // print_r($data);
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
            "status" => $status,
        );

        echo json_encode($res);
    }

    public function hapusData()
    {
        $id_santri = $_POST['id_santri'];

        $status = $this->SantriModel->hapusData($id_santri);

        echo $status;
    }

    public function getDataById()
    {
        $id_santri = $_POST['id_santri'];

        $data = $this->SantriModel->getDataById($id_santri);

        echo json_encode($data);
    }
}
