<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        if($this->session->userdata('login'))
        {
            if($this->session->userdata('role') == 'admin')
            {
                redirect('admin/dashboard');
            }

            redirect('customer/dashboard');
        }

        $this->load->view('auth/login');
    }

    /*
    |--------------------------------------------------------------------------
    | PROCESS LOGIN
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email'
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required'
        );

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('auth/login');
            return;
        }

        $email = trim(
            $this->input->post('email')
        );

        $password = $this->input->post('password');

        $user = $this->User_model->getUserByEmail($email);

        if(!$user)
        {
            $this->session->set_flashdata(
                'error',
                'Email tidak ditemukan'
            );

            redirect('auth');
        }

        if(
            !password_verify(
                $password,
                $user->password
            )
        )
        {
            $this->session->set_flashdata(
                'error',
                'Password salah'
            );

            redirect('auth');
        }

        if($user->status != 'aktif')
        {
            $this->session->set_flashdata(
                'error',
                'Akun tidak aktif'
            );

            redirect('auth');
        }

        $data_session = [

            'id_user' => $user->id,

            'nama' => $user->nama,

            'email' => $user->email,

            'role' => $user->role,

            'login' => TRUE
        ];

        $this->session->set_userdata(
            $data_session
        );

        if($user->role == 'admin')
        {
            redirect('admin/dashboard');
        }

        redirect('customer/dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER PAGE
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        $this->load->view(
            'auth/register'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PROCESS REGISTER
    |--------------------------------------------------------------------------
    */

    public function process_register()
    {
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required'
        );

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email'
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]'
        );

        $this->form_validation->set_rules(
            'telepon',
            'Telepon',
            'required'
        );

        if(
            $this->form_validation->run()
            == FALSE
        )
        {
            $this->load->view(
                'auth/register'
            );

            return;
        }

        $email = trim(
            $this->input->post('email')
        );

        $cek = $this->User_model->getUserByEmail($email);

        if($cek)
        {
            $this->session->set_flashdata(
                'error',
                'Email sudah digunakan'
            );

            redirect('auth/register');
        }

        $user = [

            'nama' => $this->input->post('nama'),

            'email' => $email,

            'password' => password_hash(
                $this->input->post('password'),
                PASSWORD_DEFAULT
            ),

            'role' => 'customer',

            'status' => 'aktif',

            'created_at' => date(
                'Y-m-d H:i:s'
            )
        ];

        $user_id = $this->User_model
            ->insertUser($user);

        $pelanggan = [

            'user_id' => $user_id,

            'nik' => $this->input
                        ->post('nik'),

            'alamat' => $this->input
                        ->post('alamat'),

            'telepon' => $this->input
                        ->post('telepon'),

            'jumlah_transaksi' => 0,

            'is_pelanggan_lama' => 0
        ];

        $this->User_model
            ->insertPelanggan(
                $pelanggan
            );

        $this->session->set_flashdata(
            'success',
            'Registrasi berhasil'
        );

        redirect('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('auth');
    }
}