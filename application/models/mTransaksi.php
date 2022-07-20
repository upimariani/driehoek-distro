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

    //data transaksi admin
    public function transaksi_all()
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('user', 'order.id_user = user.id_user', 'left');
        return $this->db->get()->result();
    }

    public function detail_pesanan($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `order` WHERE id_order='" . $id . "';")->row();
        $data['produk'] = $this->db->query("SELECT * FROM `order` JOIN detail_order ON detail_order.id_order = order.id_order JOIN size ON size.id_size = detail_order.id_size JOIN produk ON size.id_produk = produk.id_produk WHERE order.id_order='" . $id . "';")->result();
        return $data;
    }
}

/* End of file mTransaksi.php */
