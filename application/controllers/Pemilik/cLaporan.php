<?php
defined('BASEPATH') or exit('No direct script access allowed');

class claporan extends CI_Controller
{

    public function index()
    {
        $this->load->view('Pemilik/Layout/head');
        $this->load->view('Pemilik/Layout/sidebar');
        $this->load->view('Pemilik/Laporan/vLaporan');
        $this->load->view('Pemilik/Layout/footer');
    }
}

/* End of file claporan.php */
