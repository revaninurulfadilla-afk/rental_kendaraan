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
    }
    public function ajukan($id_transaksi)
{
    $transaksi = $this->db
        ->where('id',$id_transaksi)
        ->where(
            'user_id',
            $this->session->userdata('id_user')
        )
        ->get('transaksi')
        ->row();

    if(!$transaksi)
    {
        show_404();
    }

    /*
    |--------------------------------------------------------------------------
    | Cek apakah sudah pernah diajukan
    |--------------------------------------------------------------------------
    */

    $cek = $this->db
        ->where('transaksi_id',$id_transaksi)
        ->get('pengembalian')
        ->row();

    if($cek)
    {
        $this->session->set_flashdata(
            'error',
            'Pengembalian sudah pernah diajukan.'
        );

        redirect('customer/pengembalian');
    }

    /*
    |--------------------------------------------------------------------------
    | Update Status Transaksi
    |--------------------------------------------------------------------------
    */

    $this->db
        ->where('id',$id_transaksi)
        ->update('transaksi',[
            'status' => 'pengembalian_diajukan'
        ]);

    /*
    |--------------------------------------------------------------------------
    | Simpan Pengembalian
    |--------------------------------------------------------------------------
    */

    $this->db->insert('pengembalian',[
        'transaksi_id'          => $id_transaksi,
        'tanggal_pengembalian'  => date('Y-m-d H:i:s'),
        'terlambat_jam'         => 0,
        'denda'                 => 0,
        'keterangan'            => 'Pengembalian diajukan',
        'created_at'            => date('Y-m-d H:i:s')
    ]);

    $this->session->set_flashdata(
        'success',
        'Pengembalian berhasil diajukan.'
    );

    redirect('customer/pengembalian');
}

    public function index()
{
    $data['transaksi'] = $this->db
        ->select('
            transaksi.*,
            kendaraan.merk,
            kendaraan.nama_kendaraan,
            kendaraan.foto
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
        ->where_in('transaksi.status',[
    'dibayar',
    'berjalan',
    'pengembalian_diajukan',
    'selesai'
])
        ->get()
        ->result();

    $data['title'] = 'Pengembalian';

    $this->load->view('customer/template/header',$data);
    $this->load->view('customer/template/navbar');
    $this->load->view('customer/pengembalian/index',$data);
    $this->load->view('customer/template/footer');
    $this->load->view('customer/template/script');
}
}