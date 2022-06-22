<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mProduk extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('produk', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        return $this->db->get()->result();
    }
    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('id_produk', $id);
        return $this->db->get()->row();
    }
    public function update($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }


    //kelola size produk
    public function size_select($id)
    {
        $this->db->select('*');
        $this->db->from('size');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->where('produk.id_produk', $id);
        return $this->db->get()->result();
    }
    public function insert_size($data)
    {
        $this->db->insert('size', $data);
    }
    public function update_size($id, $data)
    {
        $this->db->where('id_size', $id);
        $this->db->update('size', $data);
    }
    public function delete_size($id)
    {
        $this->db->where('id_size', $id);
        $this->db->delete('size');
    }
}

/* End of file mProduk.php */
