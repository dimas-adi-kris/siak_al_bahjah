<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('UserModel');
    // }
    public function index()
    {
        $this->load->view('user');
    }
    public function getListTabel()
    {
        $listJenisRuangan = $this->UserModel->getListTabel();
        echo json_encode($listJenisRuangan);
    }
    public function getListTabelJoin()
    {
        $listJenisRuangan = $this->UserModel->getListTabelJoin();
        echo json_encode($listJenisRuangan);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_user = $_POST['id_user'];

        $data = $this->UserModel->insertData($data);
        if ($data) {
            $status = 1;
        } else {
            $status = 0;
        }

        $res = array(
            "data" => $data,
            "status" => $status,
        );

        echo json_encode($res);
    }

    public function updateData()
    {
        $data = $_POST;

        $id_user = $_POST['id_user'];

        $data = $this->UserModel->updateData($data);

        if ($data) {
            $status = 1;
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
        $id_user = $_POST['id_user'];

        $status = $this->UserModel->hapusData($id_user);

        echo $status;
    }

    public function tesExist()
    {
        $tess = $this->UserModel->tesexist();
        // if ($tess) {
        //     $status = 1;
        // } else {
        //     $status = 0;
        // }
        // $listJenisRuangan = $this->UserModel->getListTabel();
        // echo json_encode($listJenisRuangan);
        // $res = array(
        //     "data" => $tess,
        //     "status" => $status,
        // );

        echo json_encode($tess);
    }

    public function getDataById()
    {
        $id_user = $_POST['id_user'];

        $data = $this->UserModel->getDataById($id_user);

        // print_r('p'.$id_user);
        echo json_encode($data);
    }
}
