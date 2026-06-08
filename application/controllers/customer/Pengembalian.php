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
public function form($id)
{
    $data['transaksi'] = $this->db
        ->select('
            transaksi.*,
            kendaraan.merk,
            kendaraan.nama_kendaraan,
            kendaraan.denda_per_jam
        ')
        ->from('transaksi')
        ->join(
            'kendaraan',
            'kendaraan.id = transaksi.kendaraan_id'
        )
        ->where('transaksi.id',$id)
        ->where(
            'transaksi.user_id',
            $this->session->userdata('id_user')
        )
        ->get()
        ->row();

    if(!$data['transaksi'])
    {
        show_404();
    }

    $data['title'] = 'Form Pengembalian';

    $this->load->view('customer/template/header',$data);
    $this->load->view('customer/template/navbar');
    $this->load->view('customer/pengembalian/form',$data);
    $this->load->view('customer/template/footer');
}
public function simpan($id)
{
    $transaksi = $this->db
        ->where('id',$id)
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

    // Cek sudah pernah mengajukan atau belum
    $cek = $this->db
        ->where('transaksi_id',$id)
        ->get('pengembalian')
        ->row();

    if($cek)
    {
        $this->session->set_flashdata(
            'error',
            'Pengembalian sudah diajukan.'
        );

        redirect('customer/pengembalian');
    }

    // Ambil kendaraan
    $kendaraan = $this->db
        ->where('id',$transaksi->kendaraan_id)
        ->get('kendaraan')
        ->row();

    $tanggal_pengembalian =
        $this->input->post('tanggal_pengembalian');

    $terlambat_jam = 0;
    $denda = 0;

    // Hitung keterlambatan
    if(
        strtotime($tanggal_pengembalian)
        >
        strtotime($transaksi->tgl_selesai)
    )
    {
        $selisih =
            strtotime($tanggal_pengembalian)
            -
            strtotime($transaksi->tgl_selesai);

        $terlambat_jam =
            ceil($selisih / 3600);

        // Ambil denda dari kendaraan
        $denda =
            $terlambat_jam *
            $kendaraan->denda_per_jam;
    }

    // Upload foto
    $foto = '';

    if(!empty($_FILES['foto_kendaraan']['name']))
    {
        $config['upload_path'] =
            './assets/customer/pengembalian/';

        $config['allowed_types'] =
            'jpg|jpeg|png';

        $config['encrypt_name'] = TRUE;

        $this->load->library(
            'upload',
            $config
        );

        if(
            $this->upload->do_upload(
                'foto_kendaraan'
            )
        )
        {
            $foto =
                $this->upload
                ->data('file_name');
        }
    }

    // Simpan pengembalian
    $this->db->insert('pengembalian',[
        'transaksi_id' => $id,
        'tanggal_pengembalian' =>
            $tanggal_pengembalian,
        'terlambat_jam' =>
            $terlambat_jam,
        'denda' =>
            $denda,
        'foto_kendaraan' =>
            $foto,
        'keterangan' =>
            $this->input->post(
                'keterangan'
            ),
        'created_at' =>
            date('Y-m-d H:i:s')
    ]);

    // Update status transaksi
    $this->db
        ->where('id',$id)
        ->update('transaksi',[
            'status' =>
                'pengembalian_diajukan'
        ]);

    $this->session->set_flashdata(
        'success',
        'Pengembalian berhasil diajukan'
    );

    redirect('customer/pengembalian');
}
}