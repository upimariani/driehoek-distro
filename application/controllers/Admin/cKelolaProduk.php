<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cKelolaProduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mProduk');
        $this->load->model('mKategori');
    }


    public function index()
    {
        $data = array(
            'produk' => $this->mProduk->select()
        );
        $this->load->view('AdminGudang/Layout/head');
        $this->load->view('AdminGudang/Layout/sidebar');
        $this->load->view('AdminGudang/Produk/vProduk', $data);
        $this->load->view('AdminGudang/Layout/footer');
    }
    public function create()
    {
        $this->form_validation->set_rules('kategori', 'Kategori Produk', 'required');
        $this->form_validation->set_rules('produk', 'Kategori Produk', 'required');
        $this->form_validation->set_rules('deskripsi', 'Kategori Produk', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'kategori' => $this->mKategori->select()
            );
            $this->load->view('AdminGudang/Layout/head');
            $this->load->view('AdminGudang/Layout/sidebar');
            $this->load->view('AdminGudang/Produk/vCreate', $data);
            $this->load->view('AdminGudang/Layout/footer');
        } else {
            $config['upload_path']          = './asset/foto-produk';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('AdminGudang/Layout/head');
                $this->load->view('AdminGudang/Layout/sidebar');
                $this->load->view('AdminGudang/Produk/vCreate', $error);
                $this->load->view('AdminGudang/Layout/footer');
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'id_kategori' => $this->input->post('kategori'),
                    'nama_produk' => $this->input->post('produk'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['file_name']
                );
                $this->mProduk->insert($data);
                $this->session->set_flashdata('success', 'Data Produk Berhasil Disimpan!');
                redirect('Admin/cKelolaProduk');
            }
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('kategori', 'Kategori Produk', 'required');
        $this->form_validation->set_rules('produk', 'Kategori Produk', 'required');
        $this->form_validation->set_rules('deskripsi', 'Kategori Produk', 'required');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './asset/foto-produk';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 5000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'produk' => $this->mProduk->edit($id),
                    'kategori' => $this->mKategori->select()
                );
                $this->load->view('AdminGudang/Layout/head');
                $this->load->view('AdminGudang/Layout/sidebar');
                $this->load->view('AdminGudang/Produk/vUpdate', $data);
                $this->load->view('AdminGudang/Layout/footer');
            } else {
                $produk = $this->mProduk->select();
                if ($produk->gambar !== "") {
                    unlink('./asset/foto-produk/' . $produk->gambar);
                }
                $upload_data =  $this->upload->data();
                $data = array(
                    'id_kategori' => $this->input->post('kategori'),
                    'nama_produk' => $this->input->post('produk'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['file_name']
                );
                $this->mProduk->update($id, $data);
                $this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
                redirect('Admin/cKelolaProduk');
            } //tanpa ganti gambar
            $data = array(
                'id_kategori' => $this->input->post('kategori'),
                'nama_produk' => $this->input->post('produk'),
                'deskripsi' => $this->input->post('deskripsi'),
            );
            $this->mProduk->update($id, $data);
            $this->session->set_flashdata('success', 'Data Produk Berhasil Diperbaharui !!!');
            redirect('Admin/cKelolaProduk');
        }
        $data = array(
            'produk' => $this->mProduk->edit($id),
            'kategori' => $this->mKategori->select()
        );
        $this->load->view('AdminGudang/Layout/head');
        $this->load->view('AdminGudang/Layout/sidebar');
        $this->load->view('AdminGudang/Produk/vUpdate', $data);
        $this->load->view('AdminGudang/Layout/footer');
    }
    public function delete($id)
    {
        $this->mProduk->delete($id);
        $this->session->set_flashdata('success', 'Data Produk Berhasil Dihapus !!!');
        redirect('Admin/cKelolaProduk');
    }
}

/* End of file cKelolaProduk.php */
