<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('RuanganModel');
    // }
    public function index()
    {
        $this->load->view('ruangan');
    }
    public function getListTabel()
    {
        $listJenisRuangan = $this->RuanganModel->getListTabel();
        echo json_encode($listJenisRuangan);
    }
    public function getListTabelJoin()
    {
        $listJenisRuangan = $this->RuanganModel->getListTabelJoin();
        echo json_encode($listJenisRuangan);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_ruangan = $_POST['id_ruangan'];

        if($id_ruangan==''||!isset($id_ruangan)){
            $data = $this->RuanganModel->insertData($data);
        }
        else{
            $data = $this->RuanganModel->updateData($data);
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
            "status" => $status
        );

        echo json_encode($res);
    }

    public function hapusData(){
        $id_ruangan = $_POST['id_ruangan'];

        $status = $this->RuanganModel->hapusData($id_ruangan);

        echo $status;
    }

    public function getDataById(){
        $id_ruangan = $_POST['id_ruangan'];

        $data = $this->RuanganModel->getDataById($id_ruangan);

        echo json_encode($data);
    }
}
