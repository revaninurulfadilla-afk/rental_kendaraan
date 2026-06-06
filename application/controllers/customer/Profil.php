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
    }

    public function index()
    {
        $this->load->view('customer/template/header');
        $this->load->view('customer/template/navbar');
        $this->load->view('customer/profil');
        $this->load->view('customer/template/footer');
        $this->load->view('customer/template/script');
    }
}