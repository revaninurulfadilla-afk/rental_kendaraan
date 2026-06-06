<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }

        $this->load->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'Profil Admin';

        $data['user'] = $this->db
            ->where('id', $this->session->userdata('id_user'))
            ->get('users')
            ->row();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/profil/index',$data);
        $this->load->view('admin/template/footer');
    }
}