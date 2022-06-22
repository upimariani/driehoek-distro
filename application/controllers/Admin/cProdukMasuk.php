<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProdukMasuk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mProduk');
        $this->load->model('mProdukMasuk');
    }

    public function index()
    {
        $data = array(
            'produk_masuk' => $this->mProdukMasuk->select()
        );
        $this->load->view('AdminGudang/Layout/head');
        $this->load->view('AdminGudang/Layout/sidebar');
        $this->load->view('AdminGudang/Produk-Masuk/vProdukMasuk', $data);
        $this->load->view('AdminGudang/Layout/footer');
    }
    public function create()
    {
        $this->form_validation->set_rules('produk', 'Produk', 'required');
        $this->form_validation->set_rules('size', 'Size Produk', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Masuk', 'required');
        $this->form_validation->set_rules('qty', 'Quantity Produk', 'required');


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'produk' => $this->mProduk->select()
            );
            $this->load->view('AdminGudang/Layout/head');
            $this->load->view('AdminGudang/Layout/sidebar');
            $this->load->view('AdminGudang/Produk-Masuk/vCreatePMasuk', $data);
            $this->load->view('AdminGudang/Layout/footer');
        } else {
            $data = array(
                'id_size' => $this->input->post('size'),
                'tgl_masuk' => $this->input->post('tgl'),
                'qty_masuk' => $this->input->post('qty')
            );
            $this->mProdukMasuk->insert($data);

            $stok_s = $this->input->post('stok');
            $stok_u = $stok_s + $data['qty_masuk'];
            $stok = array(
                'stok' => $stok_u
            );
            $this->mProdukMasuk->stok($data['id_size'], $stok);
            $this->session->set_flashdata('success', 'Data Produk Masuk Berhasil Disimpan!');
            redirect('Admin/cProdukMasuk');
        }
    }
    public function size()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->mProdukMasuk->size($id);
        echo json_encode($data);
    }
    public function edit($id)
    {
        $data = array(
            'produk' => $this->mProduk->select(),
            'produk_masuk' => $this->mProdukMasuk->edit($id)
        );
        $this->load->view('AdminGudang/Layout/head');
        $this->load->view('AdminGudang/Layout/sidebar');
        $this->load->view('AdminGudang/Produk-Masuk/vUpdatePMasuk', $data);
        $this->load->view('AdminGudang/Layout/footer');
    }
    public function delete($id)
    {
    }
}

/* End of file cProdukMasuk.php */
