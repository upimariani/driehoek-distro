<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mProdukMasuk extends CI_Model
{
    //memanggil size sesuai produk
    public function size($id)
    {
        $this->db->select('*');
        $this->db->from('size');
        $this->db->where('id_produk', $id);
        return $this->db->get()->result();
    }
    public function insert($data)
    {
        $this->db->insert('produk_masuk', $data);
    }

    //update stok
    public function stok($id, $data)
    {
        $this->db->where('id_size', $id);
        $this->db->update('size', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('produk_masuk');
        $this->db->join('size', 'produk_masuk.id_size = size.id_size', 'left');
        $this->db->join('produk', 'produk.id_produk = size.id_produk', 'left');
        return $this->db->get()->result();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('produk_masuk');
        $this->db->join('size', 'produk_masuk.id_size = size.id_size', 'left');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->where('id_produk_masuk', $id);
        return $this->db->get()->row();
    }
}

/* End of file mProdukMasuk.php */
