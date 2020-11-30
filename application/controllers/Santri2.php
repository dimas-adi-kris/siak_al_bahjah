<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri2 extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('home');
    }
    // public function getProfilPage()
    // {
    //     $this->load->view('profil');
    // }
    public function getRuangan()
    {
        $this->load->view('ruangan');
    }
    public function kurikulum()
    {
        $this->load->view('/kurikulum/2020');
        // $this->load->view('/kurikulum/2015');
        // $this->load->view('/kurikulum/2010');
    }
}
