<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }

        if($this->session->userdata('role') != 'admin')
        {
            redirect('auth/logout');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Pengembalian';

        $data['pengembalian'] = $this->db
            ->select('
                pengembalian.*,
                transaksi.kode_transaksi,
                kendaraan.merk,
                kendaraan.nama_kendaraan
            ')
            ->from('pengembalian')
            ->join('transaksi','transaksi.id=pengembalian.transaksi_id')
            ->join('kendaraan','kendaraan.id=transaksi.kendaraan_id')
            ->order_by('pengembalian.id','DESC')
            ->get()
            ->result();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/pengembalian/index',$data);
        $this->load->view('admin/template/footer');
    }
}