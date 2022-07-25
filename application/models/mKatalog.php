<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKatalog extends CI_Model
{
    public function katalog()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->join('size', 'produk.id_produk = size.id_produk', 'left');
        $this->db->where('harga_jual!=0');
        $this->db->group_by('size.id_produk');
        return $this->db->get()->result();
    }
    public function detail_menu($id)
    {
        $data['menu'] = $this->db->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori JOIN size ON produk.id_produk = size.id_produk WHERE produk.id_produk='" . $id . " AND harga_jual != 0 ' GROUP BY size.id_produk")->row();
        $data['size'] = $this->db->query("SELECT * FROM size JOIN produk ON size.id_produk = produk.id_produk WHERE produk.id_produk='" . $id . "' AND harga_jual != 0")->result();
        return $data;
    }

    //mengurangi jumlah stok
    public function stok($id, $data)
    {
        $this->db->where('id_size', $id);
        $this->db->update('size', $data);
    }
}

/* End of file mkatalog.php */
