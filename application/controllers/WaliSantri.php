<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WaliSantri extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('WaliSantriModel');
    // }
    public function index()
    {
        $this->load->view('wali_calon_santri');
    }
    public function getListTabel()
    {
        $listJenisRuangan = $this->WaliSantriModel->getListTabel();
        echo json_encode($listJenisRuangan);
    }
    public function getListTabelJoin()
    {
        $listJenisRuangan = $this->WaliSantriModel->getListTabelJoin();
        echo json_encode($listJenisRuangan);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_wali_calon_santri = $_POST['id_wali_calon_santri'];

        if($id_wali_calon_santri==''||!isset($id_wali_calon_santri)){
            $data = $this->WaliSantriModel->insertData($data);
        }
        else{
            $data = $this->WaliSantriModel->updateData($data);
            // print_r($data);
        }
        // print_r($data);
        if ($data) {
            $status = 1;
            // close session
            // $this->session->unset_wali_calon_santridata('sekolah_id');
        } else {
            $status = 0;
        }

        $res = array(
            "data" => $data,
            "status" => $status
        );

        echo json_encode($res);
    }

    public function hapusData(){
        $id_wali_calon_santri = $_POST['id_wali_calon_santri'];

        $status = $this->WaliSantriModel->hapusData($id_wali_calon_santri);

        echo $status;
    }

    public function getDataById(){
        $id_wali_calon_santri = $_POST['id_wali_calon_santri'];

        $data = $this->WaliSantriModel->getDataById($id_wali_calon_santri);

        // print_r('p'.$id_wali_calon_santri);
        echo json_encode($data);
    }
}
