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
            'transaksi' => $this->mTransaksi->transaksi_all()
        );
        $this->load->view('AdminGudang/Layout/head');
        $this->load->view('AdminGudang/Layout/sidebar');
        $this->load->view('AdminGudang/Transaksi/transaksi', $data);
        $this->load->view('AdminGudang/Layout/footer');
    }
}

/* End of file cTransaksi.php */
