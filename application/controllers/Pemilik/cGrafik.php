<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cGrafik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLaporan');
    }

    public function index()
    {
        $data = array(
            'grafik' => $this->mLaporan->grafik(),
        );
        $this->load->view('Pemilik/Layout/head');
        $this->load->view('Pemilik/Layout/sidebar');
        $this->load->view('Pemilik/Grafik/vGrafik', $data);
        $this->load->view('Pemilik/Layout/footer');
    }
}
