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

    public function edit()
{
    $user = $this->db
        ->where('id', $this->session->userdata('id_user'))
        ->get('users')
        ->row();

    if(!$user)
    {
        show_404();
    }

    if($this->input->post())
    {
        $data = [
            'nama'  => $this->input->post('nama'),
            'email' => $this->input->post('email')
        ];

        if(!empty($this->input->post('password')))
        {
            $data['password'] = password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            );
        }

        $this->db
            ->where('id', $user->id)
            ->update('users', $data);

        $this->session->set_flashdata(
            'success',
            'Profil berhasil diperbarui'
        );

        redirect('admin/profil');
    }

    $data['title'] = 'Edit Profil';
    $data['user']  = $user;

    $this->load->view('admin/template/header', $data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/profil/edit', $data);
    $this->load->view('admin/template/footer');
}
}