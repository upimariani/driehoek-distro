<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProdukMasuk extends CI_Controller
{

    public function index()
    {
        $this->load->view('AdminGudang/Layout/head');
        $this->load->view('AdminGudang/Layout/sidebar');
        $this->load->view('AdminGudang/Produk-Masuk/vProdukMasuk');
        $this->load->view('AdminGudang/Layout/footer');
    }
}

/* End of file cProdukMasuk.php */
