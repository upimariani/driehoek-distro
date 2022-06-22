<?php
defined('BASEPATH') or exit('No direct script access allowed');

class claporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksi');
    }

    public function index()
    {
        $data = array(
            'transaksi' => $this->mTransaksi->transaksi()
        );
        $this->load->view('Sales/Layout/head');
        $this->load->view('Sales/Layout/sidebar');
        $this->load->view('Sales/transaksi/lap_sales', $data);
        $this->load->view('Sales/Layout/footer');
    }
}

/* End of file claporan.php */
