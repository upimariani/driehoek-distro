<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLogin');
    }


    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('vLogin');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = $this->mLogin->login($username, $password);
            if ($data) {
                $id = $data->id_user;
                $level = $data->level_user;

                $this->session->set_userdata('id', $id);
                if ($level == '1') {
                    redirect('Pemilik/cLaporan');
                } else if ($level == '2') {
                    redirect('cKelolaProduk');
                } else if ($level == '3') {
                    redirect('Sales/cKatalog');
                }
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Salah!');
                redirect('cLogin');
            }
        }
    }
}

/* End of file cLogin.php */
