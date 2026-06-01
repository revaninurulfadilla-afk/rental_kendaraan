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
    $nama     = $this->input->post('nama');
    $email    = $this->input->post('email');
    $password = md5($this->input->post('password'));

    // cek email
    $cek = $this->db->get_where('users', [
        'email' => $email
    ])->row();

    if($cek){

        echo "<script>
                alert('Email sudah terdaftar');
                window.history.back();
              </script>";
        return;
    }

    // simpan ke users
    $data_user = [
        'nama'     => $nama,
        'email'    => $email,
        'password' => $password,
        'role'     => 'customer'
    ];

    $this->db->insert('users', $data_user);

    // ambil id user yang baru dibuat
    $id_user = $this->db->insert_id();

    // generate id pelanggan
    $jumlah = $this->db->count_all('pelanggan') + 1;

    $id_pelanggan = 'PLG'.str_pad(
        $jumlah,
        3,
        '0',
        STR_PAD_LEFT
    );

    // simpan ke pelanggan
    $data_pelanggan = [
        'id_pelanggan'     => $id_pelanggan,
        'id_user'          => $id_user,
        'nama'             => $nama,
        'email'            => $email,
        'password'         => $password,
        'status_pelanggan' => 'Baru'
    ];

    $this->db->insert('pelanggan', $data_pelanggan);

    echo "<script>
            alert('Registrasi berhasil');
            window.history.back();
          </script>";
}
    // LOGOUT
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
    

}