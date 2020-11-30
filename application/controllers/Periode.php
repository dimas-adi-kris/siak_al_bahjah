<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode extends CI_Controller
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
        $this->load->view('periode');
    }


    public function getPeriode()
    {
        $dataProgram = $this->PeriodeModel->getPeriode();
        echo json_encode($dataProgram);
    }

    public function getProgram()
    {
        $progarm = $this->PeriodeModel->getProgram();
        echo json_encode($progarm);
    }

    public function getListProgram()
    {
        $progarm = $this->PeriodeModel->getListProgram();
        echo json_encode($progarm);
    }

    public function tambahPeriode()
    {
        $data = $_POST;
        $data = $this->PeriodeModel->tambahPeriode($data);

        if ($data) {
            $status = 1;
        } else {
            $status = 0;
        }

        $res = array(
            "data" => $data,
            "status" => $status
        );
        print_r($res);
        echo json_encode($res);
    }

    public function hapusPeriode()
    {
        $data = $_POST['id_periode'];
        $status = $this->PeriodeModel->hapusPeriode($data);
        echo $status;
    }

    public function getPeriodeById()
    {
        $id_periode = $_POST['id_periode'];
        $data = $this->PeriodeModel->getPeriodeById($id_periode);
        echo json_encode($data);
    }

    public function updatePeriode()
    {
        $data = $_POST;
        $data = $this->PeriodeModel->updatePeriode($data);
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
