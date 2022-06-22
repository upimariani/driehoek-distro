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
        $this->load->view('AdminGudang/Layout/head');
        $this->load->view('AdminGudang/Layout/sidebar');
        $this->load->view('AdminGudang/User/vUser', $data);
        $this->load->view('AdminGudang/Layout/footer');
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
            $this->load->view('AdminGudang/Layout/head');
            $this->load->view('AdminGudang/Layout/sidebar');
            $this->load->view('AdminGudang/User/vCreateUser');
            $this->load->view('AdminGudang/Layout/footer');
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
            redirect('Admin/cUser');
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama User', 'required');
        $this->form_validation->set_rules('no_hp', 'No Telepon', 'required|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('alamat', 'Alamat User', 'required');
        $this->form_validation->set_rules('username', 'Nama User', 'required');
        $this->form_validation->set_rules('password', 'Nama User', 'required');
        $this->form_validation->set_rules('user', 'Level User', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'user' => $this->mUser->edit($id)
            );
            $this->load->view('AdminGudang/Layout/head');
            $this->load->view('AdminGudang/Layout/sidebar');
            $this->load->view('AdminGudang/User/vUpdateUser', $data);
            $this->load->view('AdminGudang/Layout/footer');
        } else {
            $data = array(
                'nama_user' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level_user' => $this->input->post('user')
            );
            $this->mUser->update($id, $data);
            $this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!');
            redirect('Admin/cUser');
        }
    }
    public function delete($id)
    {
        $this->mUser->delete($id);
        $this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
        redirect('Admin/cUser');
    }
}

/* End of file cUser.php */
