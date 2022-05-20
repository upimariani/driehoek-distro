<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{
    public function transaksi()
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('user', 'order.id_user = user.id_user', 'left');
        $this->db->where('order.id_user', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
}

/* End of file mTransaksi.php */
