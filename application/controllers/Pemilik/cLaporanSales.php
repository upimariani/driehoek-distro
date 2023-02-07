<?php
defined('BASEPATH') or exit('No direct script access allowed');

class claporansales extends CI_Controller
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
        $this->load->view('Pemilik/LaporanSales/vLaporan');
        $this->load->view('Pemilik/Layout/footer');
    }
    public function lap_harian_sales()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->mLaporan->lap_harian_sales($tanggal, $bulan, $tahun)
        );
        $this->load->view('Pemilik/Layout/head');
        $this->load->view('Pemilik/Layout/sidebar');
        $this->load->view('Pemilik/LaporanSales/harian', $data);
        $this->load->view('Pemilik/Layout/footer');
    }
    public function lap_bulanan_sales()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
            'laporan' => $this->mLaporan->lap_bulanan_sales($bulan, $tahun)
        );
        $this->load->view('Pemilik/Layout/head');
        $this->load->view('Pemilik/Layout/sidebar');
        $this->load->view('Pemilik/LaporanSales/bulanan', $data);
        $this->load->view('Pemilik/Layout/footer');
    }
    public function lap_tahunan_sales()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun,
            'laporan' => $this->mLaporan->lap_tahunan_sales($tahun)
        );
        $this->load->view('Pemilik/Layout/head');
        $this->load->view('Pemilik/Layout/sidebar');
        $this->load->view('Pemilik/LaporanSales/tahunan', $data);
        $this->load->view('Pemilik/Layout/footer');
    }
}

/* End of file claporan.php */
