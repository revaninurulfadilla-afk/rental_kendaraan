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

        $this->load->model('Pembayaran_model');
    }

    public function bayar($id)
{
    $data['title'] = 'Upload Pembayaran';

    $data['transaksi'] = $this->db
        ->select('transaksi.*, kendaraan.merk, kendaraan.nama_kendaraan')
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
    $this->load->view('customer/form_pembayaran',$data);
    $this->load->view('customer/template/footer');
}
public function simpan()
{
    $metode = $this->input->post('metode_pembayaran');

    $bukti = NULL;
    $status = '';

    /*
    |--------------------------------------------------------------------------
    | Transfer Bank
    |--------------------------------------------------------------------------
    */
    if($metode == 'transfer')
    {
        $config['upload_path']   = './assets/uploads/pembayaran/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['encrypt_name']  = TRUE;

        $this->load->library('upload',$config);

        if(!$this->upload->do_upload('bukti'))
{
    echo $this->upload->display_errors();
    die();
}

        $upload = $this->upload->data();

        $bukti = $upload['file_name'];

        $status = 'menunggu_verifikasi';
    }

    /*
    |--------------------------------------------------------------------------
    | Cash
    |--------------------------------------------------------------------------
    */
    else
    {
        $status = 'menunggu_pembayaran_tunai';
    }

    $data = array(

        'transaksi_id' =>
            $this->input->post('transaksi_id'),

        'metode_pembayaran' =>
            $metode,

        'tanggal_bayar' =>
            date('Y-m-d H:i:s'),

        'jumlah_bayar' =>
            $this->input->post('jumlah_bayar'),

        'bukti_pembayaran' =>
            $bukti,

        'status' =>
            $status,

        'created_at' =>
            date('Y-m-d H:i:s')

    );

    $this->db->insert('pembayaran',$data);

    $this->db
    ->where('id',$this->input->post('transaksi_id'))
    ->update('transaksi',[
        'status' => 'menunggu_pembayaran'
    ]);

    $this->session->set_flashdata(
        'success',
        'Pembayaran berhasil dikirim'
    );

    redirect('customer/pembayaran');
}
    public function index()
    {
        $data['title'] = 'Pembayaran';

        $data['transaksi'] =
            $this->Pembayaran_model
            ->get_transaksi_user(
                $this->session->userdata('id_user')
            );

        $this->load->view('customer/template/header',$data);
        $this->load->view('customer/template/navbar');
        $this->load->view('customer/pembayaran',$data);
        $this->load->view('customer/template/footer');
        $this->load->view('customer/template/script');
    }
}