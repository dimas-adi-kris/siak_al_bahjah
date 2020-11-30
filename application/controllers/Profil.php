<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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
    // public function index()
    // {
    //     // $this->load->view('welcome_santri');
    //     $this->load->view('home');
    // }
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SekolahModel');
    }

    public function getProfilPage()
    {
        $this->load->view('profil');
    }

    public function getDataProfil($id)
    {
        $sekolah = $this->SekolahModel->getSekolahById($id);
        $res = array(
            "id" => $sekolah['id'],
            "nama_lengkap" => $sekolah['nama_lengkap'],
            "singkatan" => $sekolah["singkatan"],
            "alamat" => $sekolah["alamat"],
            "telepon" => $sekolah["telepon"],
            "email" => $sekolah["email"]
        );
        // return $res;
        // echo json_encode($res);
        echo json_encode($res);
    }

    public function simpanDataProfil()
    {
        $sekolah = $_POST;
        $status = $this->SekolahModel->updateData($sekolah);

        if ($status) {
            $status = 1;
            // close session
            $this->session->unset_userdata('sekolah_id');
        } else {
            $status = 0;
        }

        $res = array(
            "sekolah" => $sekolah,
            "status" => $status
        );

        echo json_encode($res);
    }
    public function simpanIDSekolahSession()
    {
        $id = $_POST['id'];
        // $id = 1;
        // set session
        $this->session->set_userdata('sekolah_id', $id);
        // nama session
        $newId = $this->session->userdata('sekolah_id');
        echo $newId;
        // echo $id;
    }

    // public function getRuangan()
    // {
    //     $this->load->view('ruangan');
    // }
    // public function kurikulum()
    // {
    //     $this->load->view('/kurikulum/2020');
    //     // $this->load->view('/kurikulum/2015');
    //     // $this->load->view('/kurikulum/2010');
    // }
}
