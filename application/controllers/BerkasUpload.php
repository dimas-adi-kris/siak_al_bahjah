<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BerkasUpload extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('BerkasUploadModel');
    // }
    public function do_upload()
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    $this->load->view('upload_success', $data);
            }
    }


    public function index()
    {
        $this->load->view('berkasupload');
    }
    public function getListTabel()
    {
        $listJenisRuangan = $this->BerkasUploadModel->getListTabel();
        echo json_encode($listJenisRuangan);
    }
    public function getListTabelJoin()
    {
        $listJenisRuangan = $this->BerkasUploadModel->getListTabelJoin();
        echo json_encode($listJenisRuangan);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_berkas_upload = $_POST['id_berkas_upload'];

        if($id_berkas_upload==''||!isset($id_berkas_upload)){
            $data = $this->BerkasUploadModel->insertData($data);
        }
        else{
            $data = $this->BerkasUploadModel->updateData($data);
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
        $id_berkas_upload = $_POST['id_berkas_upload'];

        $status = $this->BerkasUploadModel->hapusData($id_berkas_upload);

        echo $status;
    }

    public function getDataById(){
        $id_berkas_upload = $_POST['id_berkas_upload'];

        $data = $this->BerkasUploadModel->getDataById($id_berkas_upload);

        echo json_encode($data);
    }
}
