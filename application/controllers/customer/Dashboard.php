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

    if($this->session->userdata('role') != 'customer')
    {
        redirect('auth');
    }

    $this->load->database();
    $this->load->model('Kendaraan_model');
}

   public function index()
{
    $data['title'] = 'Dashboard Customer';

    $user_id = $this->session->userdata('id_user');

    $data['pelanggan'] = $this->db
        ->where('user_id',$user_id)
        ->get('pelanggan')
        ->row();

    $data['total_kendaraan'] = $this->db
        ->count_all('kendaraan');

    $data['total_sewa'] = $this->db
        ->where('user_id',$user_id)
        ->count_all_results('transaksi');

    $data['kendaraan'] =
        $this->Kendaraan_model->get_all();

    $this->load->view('customer/template/header',$data);
    $this->load->view('customer/template/navbar');
    $this->load->view('customer/dashboard',$data);
    $this->load->view('customer/template/footer');
    $this->load->view('customer/template/script');
}
}