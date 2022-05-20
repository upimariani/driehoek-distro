<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksi');
    }

    public function index()
    {
        $data = array(
            'order' => $this->mTransaksi->transaksi()
        );
        $this->load->view('Sales/Layout/head');
        $this->load->view('Sales/Layout/sidebar');
        $this->load->view('Sales/transaksi/transaksi', $data);
        $this->load->view('Sales/Layout/footer');
    }
}

/* End of file cTransaksi.php */
