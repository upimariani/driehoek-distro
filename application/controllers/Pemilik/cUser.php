<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cUser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mUser');
    }


    public function index()
    {
        $data = array(
            'user' => $this->mUser->select()
        );
        $this->load->view('Pemilik/Layout/head');
        $this->load->view('Pemilik/Layout/sidebar');
        $this->load->view('Pemilik/User/vUser', $data);
        $this->load->view('Pemilik/Layout/footer');
    }
    public function create()
    {
        $this->form_validation->set_rules('nama', 'Nama User', 'required');
        $this->form_validation->set_rules('no_hp', 'No Telepon', 'required|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('alamat', 'Alamat User', 'required');
        $this->form_validation->set_rules('username', 'Nama User', 'required');
        $this->form_validation->set_rules('password', 'Nama User', 'required');
        $this->form_validation->set_rules('user', 'Level User', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Pemilik/Layout/head');
            $this->load->view('Pemilik/Layout/sidebar');
            $this->load->view('Pemilik/User/vCreateUser');
            $this->load->view('Pemilik/Layout/footer');
        } else {
            $data = array(
                'nama_user' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level_user' => $this->input->post('user')
            );
            $this->mUser->insert($data);
            $this->session->set_flashdata('success', 'Data User Berhasil Disimpan!');
            redirect('Pemilik/cUser');
        }
    }
}

/* End of file cUser.php */
