<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKelolaKategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKategori');
    }
    public function index()
    {
        $data = array(
            'kategori' => $this->mKategori->select()
        );
        $this->load->view('AdminGudang/Layout/head');
        $this->load->view('AdminGudang/Layout/sidebar');
        $this->load->view('AdminGudang/Kategori/vKategori', $data);
        $this->load->view('AdminGudang/Layout/footer');
    }
    public function create()
    {
        $data = array(
            'nama_kategori' => $this->input->post('kategori')
        );
        $this->mKategori->insert($data);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Disimpan!');
        redirect('Admin/cKelolaKategori');
    }
    public function update($id)
    {
        $data = array(
            'nama_kategori' => $this->input->post('kategori')
        );
        $this->mKategori->update($id, $data);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Diperbaharui!');
        redirect('Admin/cKelolaKategori');
    }
    public function delete($id)
    {
        $this->mKategori->delete($id);
        $this->session->set_flashdata('success', 'Data Kategori Berhasil Dihapus!');
        redirect('Admin/cKelolaKategori');
    }
}

/* End of file ckelolaKategori.php */
