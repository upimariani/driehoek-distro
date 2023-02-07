<?php
defined('BASEPATH') or exit('No direct script access allowed');

class claporankategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('mLaporan');
    }


    public function index()
    {
        $this->load->view('Pemilik/Layout/head');
        $this->load->view('Pemilik/Layout/sidebar');
        $this->load->view('Pemilik/LaporanKategori/vLaporan');
        $this->load->view('Pemilik/Layout/footer');
    }
    public function lap_harian_kategori()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->mLaporan->lap_kategori_hari($tanggal, $bulan, $tahun)
        );
        $this->load->view('Pemilik/Layout/head');
        $this->load->view('Pemilik/Layout/sidebar');
        $this->load->view('Pemilik/LaporanKategori/harian', $data);
        $this->load->view('Pemilik/Layout/footer');
    }
    public function lap_bulanan_kategori()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->mLaporan->lap_kategori_bulan($bulan, $tahun)
        );
        $this->load->view('Pemilik/Layout/head');
        $this->load->view('Pemilik/Layout/sidebar');
        $this->load->view('Pemilik/LaporanKategori/bulanan', $data);
        $this->load->view('Pemilik/Layout/footer');
    }
    public function lap_tahunan_kategori()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun,
            'laporan' => $this->mLaporan->lap_kategori_tahun($tahun)
        );
        $this->load->view('Pemilik/Layout/head');
        $this->load->view('Pemilik/Layout/sidebar');
        $this->load->view('Pemilik/LaporanKategori/tahunan', $data);
        $this->load->view('Pemilik/Layout/footer');
    }
}

/* End of file claporan.php */
