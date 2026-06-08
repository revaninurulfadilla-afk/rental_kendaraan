<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Cek login
        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }

        // Cek role customer
        if($this->session->userdata('role') != 'customer')
        {
            redirect('auth');
        }

        $this->load->model('Kendaraan_model');
    }

    /*
    |--------------------------------------------------------------------------
    | DAFTAR KENDARAAN
    |--------------------------------------------------------------------------
    */

    public function index()
{

    $data['title'] = 'Daftar Kendaraan';

    $keyword = $this->input->get('keyword');
    $jenis   = $this->input->get('jenis');
    $kelas   = $this->input->get('kelas');

    $this->db->from('kendaraan');

    if($keyword != '')
    {
        $this->db->group_start();
        $this->db->like('merk', $keyword);
        $this->db->or_like('nama_kendaraan', $keyword);
        $this->db->group_end();
    }

    if($jenis != '')
    {
        $this->db->where('jenis', $jenis);
    }

    if($kelas != '')
    {
        $this->db->where('kelas', $kelas);
    }
    

    $data['kendaraan'] = $this->db->get()->result();
    $data['pelanggan'] = $this->db
    ->where('user_id', $this->session->userdata('id_user'))
    ->get('pelanggan')
    ->row();

    $this->load->view('customer/template/header', $data);
    $this->load->view('customer/template/navbar');
    $this->load->view('customer/kendaraan', $data);
    $this->load->view('customer/template/footer');
}

    /*
    |--------------------------------------------------------------------------
    | DETAIL KENDARAAN
    |--------------------------------------------------------------------------
    */

    public function detail($id = null)
    {
        if(!$id)
        {
            redirect('customer/kendaraan');
        }

        $data['title'] = 'Detail Kendaraan';

        $data['kendaraan'] =
            $this->Kendaraan_model->detail($id);
        $data['pelanggan'] = $this->db
    ->where('user_id', $this->session->userdata('id_user'))
    ->get('pelanggan')
    ->row();

        if(!$data['kendaraan'])
        {
            show_404();
        }

        $data['related'] =
            $this->Kendaraan_model->get_all();

        $this->load->view(
            'customer/template/header',
            $data
        );

        $this->load->view(
            'customer/template/navbar'
        );

        $this->load->view(
            'customer/detail_kendaraan',
            $data
        );

        $this->load->view(
            'customer/template/footer'
        );
    }
}