<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKatalog extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('mKatalog');
    }

    public function index()
    {
        $data = array(
            'menu' => $this->mKatalog->katalog()
        );
        $this->load->view('Sales/Layout/head');
        $this->load->view('Sales/Layout/sidebar');
        $this->load->view('Sales/menu/katalog', $data);
        $this->load->view('Sales/Layout/footer');
    }
    public function detail_produk($id)
    {
        $data = array(
            'id' => $id,
            'detail' => $this->mKatalog->detail_menu($id)
        );
        $this->load->view('Sales/Layout/head');
        $this->load->view('Sales/Layout/sidebar');
        $this->load->view('Sales/menu/detail_menu', $data);
        $this->load->view('Sales/Layout/footer');
    }
    public function add_cart()
    {
        $id_produk = $this->input->post('id_produk');
        $stok = $this->input->post('stok');
        $qty = $this->input->post('qty');
        if ($stok < $qty) {
            $this->session->set_flashdata('error', 'Quantity Melebihi Stok yang tersedia!');
            redirect('Sales/cKatalog/detail_produk/' . $id_produk);
        } else {
            $data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'qty' => $this->input->post('qty'),
                'stok' => $this->input->post('stok'),
                'size' => $this->input->post('size'),
                'picture' => $this->input->post('picture')
            );
            $this->cart->insert($data);
            $this->session->set_flashdata('success', 'Produk Berhasil Disimpan Dikeranjang!');
            redirect('Sales/cKatalog');
        }
    }
    public function cart()
    {
        $data = array(
            'cart' => $this->cart->contents()
        );
        $this->load->view('Sales/Layout/head');
        $this->load->view('Sales/Layout/sidebar');
        $this->load->view('Sales/menu/cart', $data);
        $this->load->view('Sales/Layout/footer');
    }
    public function update_cart()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid'  => $items['rowid'],
                'qty'    => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('Sales/cKatalog/cart');
    }
    public function delete_cart($rowid)
    {
        $this->cart->remove($rowid);
        redirect('Sales/cKatalog/cart');
    }

    //checkout
    public function checkout()
    {
        $data = array(
            'id_order' => $this->input->post('id_order'),
            'id_user' => $this->session->userdata('id'),
            'tgl_order' => date('Y-m-d'),
            'atas_nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'total_bayar' => $this->input->post('total')
        );
        $this->db->insert('order', $data);

        //mengurangi jumlah stok
        $kstok = 0;
        foreach ($this->cart->contents() as $key => $value) {
            $id = $value['id'];
            $kstok = $value['stok'] - $value['qty'];
            $data = array(
                'stok' => $kstok
            );
            $this->mKatalog->stok($id, $data);
        }


        //menyimpan pesanan ke detail transaksi
        $i = 1;
        foreach ($this->cart->contents() as $item) {
            $data_rinci = array(
                'id_order' => $this->input->post('id_order'),
                'id_size' => $item['id'],
                'qty' => $this->input->post('qty' . $i++)
            );
            $this->db->insert('detail_order', $data_rinci);
        }
        $this->cart->destroy();
        $this->session->set_flashdata('success', 'Pesanan Anda Berhasil Dikirim!');
        redirect('Sales/cKatalog');
    }
    
}

/* End of file cKatalog.php */
