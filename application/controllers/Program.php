<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
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
        $this->load->view('program');
    }

    public function getProgram()
    {
        $dataProgram = $this->ProgramModel->getProgram();
        echo json_encode($dataProgram);
    }

    public function tambahProgram()
    {
        $data = $_POST;
        $data = $this->ProgramModel->tambahProgram($data);

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

    public function hapusProgram()
    {
        $data = $_POST['id_program'];
        $status = $this->ProgramModel->hapusProgram($data);
        echo $status;
    }

    public function getProgramById()
    {
        $id_program = $_POST['id_program'];
        $data = $this->ProgramModel->getProgramById($id_program);
        echo json_encode($data);
    }

    public function updateProgram()
    {
        $data = $_POST;
        $data = $this->ProgramModel->updateProgram($data);
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
