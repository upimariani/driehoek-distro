<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{

    //---------laporan biasa------------
    public function lap_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('user', 'order.id_user = user.id_user', 'left');

        $this->db->where('DAY(tgl_order)', $tanggal);
        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('user', 'order.id_user = user.id_user', 'left');

        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('user', 'order.id_user = user.id_user', 'left');


        $this->db->where('YEAR(tgl_order)', $tahun);
        return $this->db->get()->result();
    }

    //---------laporan sales------------
    public function lap_harian_sales($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('user', 'order.id_user = user.id_user', 'left');
        $this->db->join('detail_order', 'order.id_order = detail_order.id_order', 'left');
        $this->db->join('size', 'detail_order.id_size = size.id_size', 'left');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->where('DAY(tgl_order)', $tanggal);
        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_bulanan_sales($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('user', 'order.id_user = user.id_user', 'left');
        $this->db->join('detail_order', 'order.id_order = detail_order.id_order', 'left');
        $this->db->join('size', 'detail_order.id_size = size.id_size', 'left');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        return $this->db->get()->result();
    }

    public function lap_tahunan_sales($tahun)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('user', 'order.id_user = user.id_user', 'left');
        $this->db->join('detail_order', 'order.id_order = detail_order.id_order', 'left');
        $this->db->join('size', 'detail_order.id_size = size.id_size', 'left');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->where('YEAR(tgl_order)', $tahun);
        return $this->db->get()->result();
    }

    //---------------Laporan Kategori--------------

    public function lap_kategori_hari($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('detail_order', 'order.id_order = detail_order.id_order', 'left');
        $this->db->join('size', 'detail_order.id_size = size.id_size', 'left');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('DAY(tgl_order)', $tanggal);
        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        $this->db->group_by('kategori.id_kategori');

        return $this->db->get()->result();
    }
    public function lap_kategori_bulan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('detail_order', 'order.id_order = detail_order.id_order', 'left');
        $this->db->join('size', 'detail_order.id_size = size.id_size', 'left');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('MONTH(tgl_order)', $bulan);
        $this->db->where('YEAR(tgl_order)', $tahun);
        $this->db->group_by('kategori.id_kategori');
        return $this->db->get()->result();
    }
    public function lap_kategori_tahun($tahun)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('detail_order', 'order.id_order = detail_order.id_order', 'left');
        $this->db->join('size', 'detail_order.id_size = size.id_size', 'left');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('YEAR(tgl_order)', $tahun);
        $this->db->group_by('kategori.id_kategori');
        return $this->db->get()->result();
    }

    //---------------grafik---------------
    public function grafik()
    {
        $this->db->select_sum('qty');
        $this->db->select('produk.nama_produk');
        //$this->db->select('rinci_transaksi.qty');
        $this->db->from('detail_order');
        $this->db->join('size', 'detail_order.id_size = size.id_size', 'left');
        $this->db->join('produk', 'size.id_produk=produk.id_produk');
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('qty', 'desc');
        return $this->db->get()->result();
    }
}

/* End of file mLaporan.php */
