<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('auth');
        }

        if($this->session->userdata('role') != 'admin'){
            redirect('auth/logout');
        }
    }

    // List semua pengembalian
   public function index()
{
$data['title'] = 'Data Pengembalian';

$data['pengembalian'] = $this->db
    ->select('
        pengembalian.*,
        transaksi.kode_transaksi,
        transaksi.total_bayar,
        transaksi.tgl_mulai,
        transaksi.tgl_selesai,
        kendaraan.merk,
        kendaraan.nama_kendaraan,
        users.nama
    ')
    ->from('pengembalian')
    ->join(
        'transaksi',
        'transaksi.id = pengembalian.transaksi_id'
    )
    ->join(
        'kendaraan',
        'kendaraan.id = transaksi.kendaraan_id'
    )
    ->join(
        'users',
        'users.id = transaksi.user_id',
        'left'
    )
    ->order_by('pengembalian.id','DESC')
    ->get()
    ->result();

$this->load->view('admin/template/header',$data);
$this->load->view('admin/template/sidebar');
$this->load->view('admin/template/topbar');
$this->load->view('admin/pengembalian/index',$data);
$this->load->view('admin/template/footer');

}

    // Detail pengembalian
    public function detail($id)
{
    $data['title'] = 'Detail Pengembalian';

    $data['pengembalian'] = $this->db
        ->select('
            pengembalian.*,
            transaksi.kode_transaksi,
            transaksi.tgl_mulai,
            transaksi.tgl_selesai,
            transaksi.total_bayar,
            kendaraan.merk,
            kendaraan.nama_kendaraan,
            users.nama
        ')
        ->from('pengembalian')
        ->join(
            'transaksi',
            'transaksi.id = pengembalian.transaksi_id'
        )
        ->join(
            'kendaraan',
            'kendaraan.id = transaksi.kendaraan_id'
        )
        ->join(
            'pelanggan',
            'pelanggan.id = transaksi.pelanggan_id'
        )
        ->join(
            'users',
            'users.id = pelanggan.user_id'
        )
        ->where('pengembalian.id', $id)
        ->get()
        ->row();

    if(!$data['pengembalian'])
    {
        show_404();
    }

    $this->load->view('admin/template/header',$data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/pengembalian/detail',$data);
    $this->load->view('admin/template/footer');
}


    // Proses pengembalian dari status "diajukan" ke selesai
    public function proses($id_pengembalian)
    {
        // Ambil data pengembalian dulu
    $pengembalian = $this->db
        ->where('id',$id_pengembalian)
        ->get('pengembalian')
        ->row();

    if(!$pengembalian){
        show_404();
    }

    // Ambil data transaksi berdasarkan pengembalian
    $transaksi = $this->db
        ->where('id',$pengembalian->transaksi_id)
        ->get('transaksi')
        ->row();

    if(!$transaksi){
        show_404();
    }

        // Hitung keterlambatan dan denda
        $batas_kembali = strtotime($transaksi->tgl_selesai);
        $tanggal_pengembalian = time();

        $terlambat_jam = ceil(($tanggal_pengembalian - $batas_kembali)/3600);
        $terlambat_jam = max($terlambat_jam, 0);
        $denda = $terlambat_jam * 10000;

        // Update atau insert pengembalian
        $pengembalian = $this->db->get_where('pengembalian',['transaksi_id'=>$transaksi->id])->row();

        if($pengembalian){
            $this->db->where('id',$pengembalian->id)
                     ->update('pengembalian',[
                        'tanggal_pengembalian' => date('Y-m-d H:i:s'),
                        'terlambat_jam' => $terlambat_jam,
                        'denda' => $denda,
                        'keterangan' => 'Pengembalian selesai'
                     ]);
        } else {
            $this->db->insert('pengembalian',[
                'transaksi_id' => $transaksi->id,
                'tanggal_pengembalian' => date('Y-m-d H:i:s'),
                'terlambat_jam' => $terlambat_jam,
                'denda' => $denda,
                'keterangan' => 'Pengembalian selesai',
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        // Update status transaksi jadi selesai
        $this->db->where('id',$transaksi->id)
                 ->update('transaksi',['status'=>'selesai']);
        
        // Hitung total transaksi selesai pelanggan
        $total_sewa = $this->db
            ->where('pelanggan_id', $transaksi->pelanggan_id)
            ->where('status', 'selesai')
            ->count_all_results('transaksi');

        // Jika sudah 5 kali atau lebih
        if($total_sewa >= 5)
        {
            $this->db
                ->where('id', $transaksi->pelanggan_id)
                ->update('pelanggan', [
                    'is_pelanggan_lama' => 1
                ]);
        }

        // Kendaraan tersedia lagi
        $this->db->where('id',$transaksi->kendaraan_id)
                 ->update('kendaraan',['status'=>'tersedia']);

        $this->session->set_flashdata('success','Pengembalian berhasil diproses');
        redirect('admin/pengembalian');


    }
}