<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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
    public function detail($id)
{
    $data['title'] = 'Detail Transaksi';

    $data['transaksi'] = $this->db
    ->select('
        transaksi.*,
        kendaraan.merk,
        kendaraan.nama_kendaraan,
        users.nama
    ')
    ->from('transaksi')
    ->join('kendaraan','kendaraan.id=transaksi.kendaraan_id')
    ->join('pelanggan','pelanggan.id=transaksi.pelanggan_id')
    ->join('users','users.id=pelanggan.user_id')
    ->where('transaksi.id',$id)
    ->get()
    ->row();

    $data['pembayaran'] = $this->db
        ->where('transaksi_id',$id)
        ->get('pembayaran')
        ->row();

    if(!$data['transaksi'])
    {
        show_404();
    }

    $this->load->view('admin/template/header',$data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/transaksi/detail',$data);
    $this->load->view('admin/template/footer');
}
public function verifikasi($id)
{
    $pembayaran = $this->db
        ->where('id',$id)
        ->get('pembayaran')
        ->row();

    if(!$pembayaran)
    {
        show_404();
    }

    $this->db
        ->where('id',$id)
        ->update('pembayaran',[
            'status' => 'dibayar'
        ]);

    $this->db
        ->where('id',$pembayaran->transaksi_id)
        ->update('transaksi',[
            'status' => 'dibayar'
        ]);

    redirect('admin/transaksi/detail/'.$pembayaran->transaksi_id);
}
public function tolak($id)
{
    $pembayaran = $this->db
        ->where('id',$id)
        ->get('pembayaran')
        ->row();

    if(!$pembayaran)
    {
        show_404();
    }

    $transaksi = $this->db
        ->where('id',$pembayaran->transaksi_id)
        ->get('transaksi')
        ->row();

    $this->db
        ->where('id',$id)
        ->update('pembayaran',[
            'status'=>'ditolak'
        ]);

    $this->db
        ->where('id',$pembayaran->transaksi_id)
        ->update('transaksi',[
            'status'=>'ditolak'
        ]);

    $this->db
        ->where('id',$transaksi->kendaraan_id)
        ->update('kendaraan',[
            'status'=>'tersedia'
        ]);

    redirect('admin/transaksi/detail/'.$pembayaran->transaksi_id);
}
    public function index()
    {
        $data['title'] = 'Data Transaksi';

        $data['transaksi'] = $this->db
            ->select('transaksi.*, kendaraan.merk')
            ->from('transaksi')
            ->join('kendaraan','kendaraan.id=transaksi.kendaraan_id')
            ->order_by('transaksi.id','DESC')
            ->get()
            ->result();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/transaksi/index',$data);
        $this->load->view('admin/template/footer');
    }
}