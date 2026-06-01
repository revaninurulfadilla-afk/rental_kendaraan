<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Dashboard_model');

        if(!$this->session->userdata('login')){
            redirect('auth');
        }
    }

    public function index()
    {
        $data['kendaraan'] = $this->Dashboard_model->get_kendaraan();

        $this->load->view('customer/dashboard', $data);
    }

}