<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('auth');
        }

        $this->load->model('Kendaraan_model');
        $this->load->model('Penyewaan_model');
    }

    // daftar penyewaan milik customer
    

    // form sewa
    public function sewa($id_kendaraan)
{
    $data['kendaraan'] =
        $this->Kendaraan_model->detail($id_kendaraan);

    $this->load->view('customer/form_sewa', $data);
}
    // simpan penyewaan
    public function simpan()
    {
        $id_kendaraan = $this->input->post('id_kendaraan');

        $kendaraan =
            $this->Kendaraan_model->detail($id_kendaraan);

        // cek kendaraan tersedia
        if($kendaraan->status_ketersediaan != 'Tersedia'){

            $this->session->set_flashdata(
                'error',
                'Kendaraan tidak tersedia'
            );

            redirect('customer/kendaraan');
        }

        $tgl_mulai   = $this->input->post('tanggal_mulai');
        $tgl_selesai = $this->input->post('tanggal_selesai');

        $durasi =
            (strtotime($tgl_selesai) - strtotime($tgl_mulai))
            / (60 * 60 * 24);

        $total_biaya =
            $kendaraan->harga_sewa * $durasi;

        $data = [
            'id_penyewaan'        => 'SW'.date('YmdHis'),
            'id_pelanggan'        => $this->session->userdata('id_user'),
            'id_kendaraan'        => $id_kendaraan,
            'tanggal_mulai'       => $tgl_mulai,
            'tanggal_selesai'     => $tgl_selesai,
            'metode_pengembalian' => $this->input->post('metode_pengembalian'),
            'durasi'              => $durasi,
            'total_biaya'         => $total_biaya,
            'status_penyewaan'    => 'Menunggu'
        ];

        $this->db->insert('penyewaan',$data);

        // update kendaraan
        $this->db->where('id_kendaraan',$id_kendaraan);
        $this->db->update('kendaraan',[
            'status_ketersediaan' => 'Disewa'
        ]);

        redirect('customer/pembayaran/index/'.$data['id_penyewaan']);
    }
public function index()
{
    $data['penyewaan'] = $this->db
        ->order_by('tanggal_mulai','DESC')
        ->get('penyewaan')
        ->result();

    $this->load->view('customer/riwayat_penyewaan',$data);
}
}