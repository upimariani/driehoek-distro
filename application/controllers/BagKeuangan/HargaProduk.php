<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HargaProduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mProduk');
    }


    public function index()
    {
        $data = array(
            'produk' => $this->mProduk->produk_jual(),
            'produk_jual' => $this->mProduk->select_produk_jual()
        );
        $this->load->view('BagKeuangan/Layouts/head');
        $this->load->view('BagKeuangan/Layouts/sidebar');
        $this->load->view('BagKeuangan/hargaProduk', $data);
        $this->load->view('BagKeuangan/Layouts/footer');
    }
    public function harga_jual()
    {
        $data = array(
            'id_size' => $this->input->post('produk'),
            'harga_jual' => $this->input->post('harga')
        );
        $this->db->where('id_size', $data['id_size']);
        $this->db->update('size', $data);
        $this->session->set_flashdata('success', 'Harga Jual Berhasil Diperbaharui!!');
        redirect('BagKeuangan/HargaProduk');
    }
    public function updatehargajual($id)
    {
        $data = array(
            'harga_jual' => $this->input->post('harga')
        );
        $this->db->where('id_size', $id);
        $this->db->update('size', $data);
        $this->session->set_flashdata('success', 'Harga Jual Berhasil Diperbaharui!!');
        redirect('BagKeuangan/HargaProduk');
    }
}

/* End of file HargaProduk.php */
