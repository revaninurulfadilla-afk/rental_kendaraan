<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
    }

    // halaman login
    public function index()
    {
        $this->load->view('auth/login');
    }

    // proses login
    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->login($email, $password);

        if($user){

            $data_session = [
                'id_user' => $user->id,
                'nama' => $user->nama,
                'role' => $user->role,
                'login' => TRUE
            ];

            $this->session->set_userdata($data_session);

            if($user->role == 'admin'){
                redirect('admin/dashboard');
            }else{
                redirect('customer/dashboard');
            }

        }else{

            echo "Email atau Password salah";

        }
    }

    // REGISTER
    public function register()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'role' => 'customer'
        ];

        $this->User_model->register($data);

        redirect('auth');
    }
    // LOGOUT
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
    

}
