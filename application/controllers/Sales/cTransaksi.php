<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

    public function index()
    {
        $this->load->view('Sales/Layout/head');
        $this->load->view('Sales/Layout/sidebar');
        $this->load->view('Sales/transaksi/transaksi');
        $this->load->view('Sales/Layout/footer');
    }
}

/* End of file cTransaksi.php */
