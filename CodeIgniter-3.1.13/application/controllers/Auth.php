<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('User_model');
    }

    // tampilkan halaman login
    public function index()
    {
        $this->load->view('auth/login');
    }

    // proses login
    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // panggil model
        $user = $this->User_model->login($email, $password);

        // cek login berhasil
        if($user){

            // simpan session
            $data_session = [
                'id_user' => $user->id,
                'nama' => $user->nama,
                'role' => $user->role,
                'login' => TRUE
            ];

            $this->session->set_userdata($data_session);

            // cek role
            if($user->role == 'admin'){
                redirect('admin/dashboard');
            }else{
                redirect('customer/dashboard');
            }

        }else{

            echo "Email atau Password salah";

        }
    }

}