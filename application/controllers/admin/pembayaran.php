<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller
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
        $data['title'] = 'Data Pembayaran';

        $data['pembayaran'] = $this->db
            ->select('
                transaksi.*,
                users.nama,
                kendaraan.merk,
                kendaraan.nama_kendaraan
            ')
            ->from('transaksi')
            ->join('users','users.id = transaksi.user_id','left')
            ->join('kendaraan','kendaraan.id = transaksi.kendaraan_id','left')
            ->order_by('transaksi.id','DESC')
            ->get()
            ->result();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/pembayaran/index',$data);
        $this->load->view('admin/template/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pembayaran';

        $data['pembayaran'] = $this->db
            ->select('
                transaksi.*,
                users.nama,
                users.email,
                kendaraan.merk,
                kendaraan.nama_kendaraan
            ')
            ->from('transaksi')
            ->join('users','users.id = transaksi.user_id','left')
            ->join('kendaraan','kendaraan.id = transaksi.kendaraan_id','left')
            ->where('transaksi.id',$id)
            ->get()
            ->row();

        if(!$data['pembayaran'])
        {
            show_404();
        }

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/pembayaran/detail',$data);
        $this->load->view('admin/template/footer');
    }

    public function konfirmasi($id)
    {
        $transaksi = $this->db
            ->where('id',$id)
            ->get('transaksi')
            ->row();

        if(!$transaksi)
        {
            show_404();
        }

        $this->db
            ->where('id',$id)
            ->update('transaksi',[
                'status' => 'dibayar'
            ]);

        $this->session->set_flashdata(
            'success',
            'Pembayaran berhasil dikonfirmasi'
        );

        redirect('admin/pembayaran');
    }

    public function kwitansi($id)
{
    $data['pembayaran'] = $this->db
        ->select('
            transaksi.*,
            users.nama,
            kendaraan.merk,
            kendaraan.nama_kendaraan
        ')
        ->from('transaksi')
        ->join('users','users.id = transaksi.user_id')
        ->join('kendaraan','kendaraan.id = transaksi.kendaraan_id')
        ->where('transaksi.id',$id)
        ->get()
        ->row();

    if(!$data['pembayaran'])
    {
        show_404();
    }

    $this->load->view(
        'admin/pembayaran/kwitansi',
        $data
    );
}

    public function tolak($id)
    {
        $transaksi = $this->db
            ->where('id',$id)
            ->get('transaksi')
            ->row();

        if(!$transaksi)
        {
            show_404();
        }

        $this->db
            ->where('id',$id)
            ->update('transaksi',[
                'status' => 'ditolak'
            ]);

        $this->session->set_flashdata(
            'success',
            'Pembayaran berhasil ditolak'
        );

        redirect('admin/pembayaran');
    }
}