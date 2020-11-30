<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asatidz extends CI_Controller
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
    //     $this->load->model('AsatidzModel');
    // }
    public function index()
    {
        $this->load->view('Asatidz');
    }
    public function getListJenisAsatidz()
    {
        $listJenisAsatidz = $this->AsatidzModel->getListJenisAsatidz();
        echo json_encode($listJenisAsatidz);
    }
    public function getListAsatidz()
    {
        $listJenisAsatidz = $this->AsatidzModel->getListAsatidz();
        echo json_encode($listJenisAsatidz);
    }
    public function simpanData()
    {
        $data = $_POST;

        $id_guru = $_POST['id_guru'];

        if($id_guru==''||!isset($id_guru)){
            $data = $this->AsatidzModel->insertData($data);
        }
        else{
            $data = $this->AsatidzModel->updateData($data);
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
        $id_guru = $_POST['id_guru'];

        $status = $this->AsatidzModel->hapusData($id_guru);

        echo $status;
    }

    public function getDataById(){
        $id_guru = $_POST['id_guru'];

        $data = $this->AsatidzModel->getDataById($id_guru);

        echo json_encode($data);
    }
}
