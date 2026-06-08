<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
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

    public function cetak()
{
    $tanggal_awal  = $this->input->get('tanggal_awal');
    $tanggal_akhir = $this->input->get('tanggal_akhir');

    $this->db
        ->select('
            transaksi.*,
            kendaraan.merk,
            kendaraan.nama_kendaraan,
            users.nama
        ')
        ->from('transaksi')
        ->join('kendaraan','kendaraan.id = transaksi.kendaraan_id')
        ->join('users','users.id = transaksi.user_id');

        $this->db->where_not_in('transaksi.status', [
            'ditolak',
            'batal',
            'booking',
            'menunggu_pembayaran'
        ]);
    if(!empty($tanggal_awal))
    {
        $this->db->where(
            'DATE(transaksi.created_at) >=',
            $tanggal_awal
        );
    }

    if(!empty($tanggal_akhir))
    {
        $this->db->where(
            'DATE(transaksi.created_at) <=',
            $tanggal_akhir
        );
    }

    $data['laporan'] = $this->db
        ->order_by('transaksi.id','DESC')
        ->get()
        ->result();

    $this->load->view(
        'admin/laporan/cetak',
        $data
    );
}


  

   public function index()
{
    $data['title'] = 'Laporan Pendapatan';

    $tanggal_awal  = $this->input->get('tanggal_awal');
    $tanggal_akhir = $this->input->get('tanggal_akhir');

    $this->db
        ->select('
            transaksi.*,
            kendaraan.merk,
            kendaraan.nama_kendaraan,
            users.nama
        ')
        ->from('transaksi')
        ->join('kendaraan','kendaraan.id = transaksi.kendaraan_id')
        ->join('users','users.id = transaksi.user_id');

        $this->db->where_not_in('transaksi.status', [
            'ditolak',
            'batal',
            'booking',
            'menunggu_pembayaran'
        ]);

    if($tanggal_awal != '')
    {
        $this->db->where(
            'DATE(transaksi.created_at) >=',
            $tanggal_awal
        );
    }

    if($tanggal_akhir != '')
    {
        $this->db->where(
            'DATE(transaksi.created_at) <=',
            $tanggal_akhir
        );
    }

    $data['laporan'] = $this->db
        ->order_by('transaksi.id','DESC')
        ->get()
        ->result();

    $data['total_pendapatan'] = 0;

    foreach($data['laporan'] as $row)
    {
        $data['total_pendapatan'] += $row->total_bayar;
    }

    $this->load->view('admin/template/header',$data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/laporan/index',$data);
    $this->load->view('admin/template/footer');
}
}