<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }
    }

    public function detail($id)
{
    $data['title'] = 'Detail Riwayat Sewa';

    $data['transaksi'] = $this->db
        ->select('transaksi.*, kendaraan.*')
        ->from('transaksi')
        ->join('kendaraan','kendaraan.id=transaksi.kendaraan_id')
        ->where('transaksi.id',$id)
        ->get()
        ->row();

    if(!$data['transaksi'])
    {
        show_404();
    }

    $this->load->view('customer/template/header',$data);
    $this->load->view('customer/template/navbar');
    $this->load->view('customer/riwayat_detail',$data);
    $this->load->view('customer/template/footer');
}

    public function index()
    {
        $data['title'] = 'Riwayat Sewa';

        $data['riwayat'] = $this->db
            ->select('
                transaksi.*,
                kendaraan.merk,
                kendaraan.nama_kendaraan
            ')
            ->from('transaksi')
            ->join(
                'kendaraan',
                'kendaraan.id = transaksi.kendaraan_id'
            )
            ->where(
                'transaksi.user_id',
                $this->session->userdata('id_user')
            )
            ->where('transaksi.status','selesai')
            ->order_by('transaksi.id','DESC')
            ->get()
            ->result();

        $this->load->view('customer/template/header',$data);
        $this->load->view('customer/template/navbar');
        $this->load->view('customer/riwayat',$data);
        $this->load->view('customer/template/footer');
        $this->load->view('customer/template/script');
    }
}