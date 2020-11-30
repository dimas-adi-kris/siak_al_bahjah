<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PdfM extends CI_Controller
{
    public function index()
    {
        $this->load->view('welcome_message');
    }

    function mypdf()
    {
        $datapdf = array(
            "dataku" => array(
                "nama" => "Petani Kode",
                "url" => "http://petanikode.com"
            )
        );
        $data["listJenisRuangan"] = $this->PembayaranModel->getListTabel();
        
        // print_r($listJenisRuangan[0]);
        // print_r($datapdf);
        // echo json_encode($listJenisRuangan);

        // die;
        // $datapdf = json_encode($listJenisRuangan);
        // print_r($listJenisRuangan);
        // print_r('--------------------------------------');
        // print_r($datapdf);

        
        $this->load->view('mypdf',$data);
        


        // $this->load->library('pdf');
    
        // $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = "laporan-petanikode.pdf";
        // $this->pdf->load_view('mypdf2', $data);
    }
}