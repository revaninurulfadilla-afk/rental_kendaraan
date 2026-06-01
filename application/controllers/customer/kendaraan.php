<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Kendaraan_model');

        if(!$this->session->userdata('login')){
            redirect('auth');
        }
    }

    public function index()
    {
        $data['kendaraan'] = $this->Kendaraan_model->get_all();

        $this->load->view('customer/kendaraan', $data);
    }
    public function detail($id)
{
    $data['kendaraan'] =
        $this->db->get_where(
            'kendaraan',
            ['id_kendaraan' => $id]
        )->row();

    $this->load->view('customer/detail_kendaraan', $data);
}
}