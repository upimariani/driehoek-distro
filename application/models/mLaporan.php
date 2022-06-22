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
}

/* End of file mLaporan.php */
