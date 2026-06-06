<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('auth');
        }
    }

    // daftar pengembalian
    public function index()
    {
        $data['pengembalian'] = $this->db
            ->order_by('tanggal_pengembalian','DESC')
            ->get('pengembalian_kendaraan')
            ->result();

        $this->load->view('customer/template/header');
        $this->load->view('customer/riwayat_pengembalian',$data);
        $this->load->view('customer/template/footer');
    }

    // ajukan pengembalian
    public function ajukan($id_penyewaan)
    {
        $data = [

            'id_pengembalian'     => 'KMB'.date('YmdHis'),
            'id_penyewaan'        => $id_penyewaan,
            'tanggal_pengembalian'=> date('Y-m-d'),
            'status_pengembalian' => 'Menunggu'

        ];

        $this->db->insert(
            'pengembalian_kendaraan',
            $data
        );

        // update status penyewaan
        $this->db->where(
            'id_penyewaan',
            $id_penyewaan
        );

        $this->db->update(
            'penyewaan',
            [
                'status_penyewaan' =>
                'Menunggu Pengembalian'
            ]
        );

        echo "
        <script>
            alert('Pengembalian berhasil diajukan');
            window.location='".site_url('customer/penyewaan')."';
        </script>
        ";
    }

}