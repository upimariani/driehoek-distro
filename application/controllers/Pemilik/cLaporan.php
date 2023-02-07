<?php
defined('BASEPATH') or exit('No direct script access allowed');

class claporan extends CI_Controller
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
        $this->load->view('Pemilik/Laporan/vLaporan');
        $this->load->view('Pemilik/Layout/footer');
    }
    public function lap_harian()
    {
        $laporan = $this->input->post('laporan');
        if ($laporan == '1') {
            $tanggal = $this->input->post('tanggal');
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');

            $data = array(
                'tanggal' => $tanggal,
                'bulan' => $bulan,
                'tahun' => $tahun,
                'laporan' => $this->mLaporan->lap_harian($tanggal, $bulan, $tahun)
            );
            $this->load->view('Pemilik/Layout/head');
            $this->load->view('Pemilik/Layout/sidebar');
            $this->load->view('Pemilik/Laporan/harian', $data);
            $this->load->view('Pemilik/Layout/footer');
        } else if ($laporan == '2') {
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
        } else if ($laporan == '3') {
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
    }
    public function lap_bulanan()
    {
        $laporan = $this->input->post('laporan');
        if ($laporan == '1') {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');

            $data = array(
                'bulan' => $bulan,
                'tahun' => $tahun,
                'laporan' => $this->mLaporan->lap_bulanan($bulan, $tahun)
            );
            $this->load->view('Pemilik/Layout/head');
            $this->load->view('Pemilik/Layout/sidebar');
            $this->load->view('Pemilik/Laporan/bulanan', $data);
            $this->load->view('Pemilik/Layout/footer');
        } else if ($laporan == '2') {
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
        } else if ($laporan == '3') {
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
    }
    public function lap_tahunan()
    {
        $laporan = $this->input->post('laporan');
        if ($laporan == '1') {
            $tahun = $this->input->post('tahun');

            $data = array(
                'tahun' => $tahun,
                'laporan' => $this->mLaporan->lap_tahunan($tahun)
            );
            $this->load->view('Pemilik/Layout/head');
            $this->load->view('Pemilik/Layout/sidebar');
            $this->load->view('Pemilik/Laporan/tahunan', $data);
            $this->load->view('Pemilik/Layout/footer');
        } else if ($laporan == '2') {
            $tahun = $this->input->post('tahun');

            $data = array(
                'tahun' => $tahun,
                'laporan' => $this->mLaporan->lap_tahunan_sales($tahun)
            );
            $this->load->view('Pemilik/Layout/head');
            $this->load->view('Pemilik/Layout/sidebar');
            $this->load->view('Pemilik/LaporanSales/tahunan', $data);
            $this->load->view('Pemilik/Layout/footer');
        } else if ($laporan == '3') {
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
}

/* End of file claporan.php */
