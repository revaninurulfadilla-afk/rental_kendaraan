<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

        // Jangan load view di sini!
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['kendaraan_tersedia'] = $this->db
    ->where('status','tersedia')
    ->count_all_results('kendaraan');

$data['kendaraan_disewa'] = $this->db
    ->where('status','disewa')
    ->count_all_results('kendaraan');

$data['kendaraan_maintenance'] = $this->db
    ->where('status','maintenance')
    ->count_all_results('kendaraan');

$data['transaksi_terbaru'] = $this->db
    ->select('transaksi.*, users.nama, kendaraan.merk')
    ->from('transaksi')
    ->join('users','users.id=transaksi.user_id')
    ->join('kendaraan','kendaraan.id=transaksi.kendaraan_id')
    ->order_by('transaksi.id','DESC')
    ->limit(5)
    ->get()
    ->result();
        // Ambil data dashboard
        $data['total_kendaraan'] = $this->db->count_all('kendaraan');
        $data['total_pelanggan'] = $this->db->where('role', 'customer')->count_all_results('users');
        $data['total_supir'] = $this->db->count_all('supir'); // sesuaikan nama tabel supir
        $data['total_transaksi'] = $this->db->count_all('transaksi');

        // Load template + view
        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('admin/template/footer');
    }
}