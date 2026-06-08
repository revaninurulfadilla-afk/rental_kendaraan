<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }

        if($this->session->userdata('role') != 'admin')
        {
            redirect('auth/logout');
        }
    }

    public function index()
{
    $data['title'] = 'Data Pelanggan';

    $data['pelanggan'] = $this->db
        ->select('
            pelanggan.*,
            users.nama,
            users.email,
            COUNT(transaksi.id) as total_sewa,
            COALESCE(SUM(transaksi.total_bayar),0) as total_bayar
        ')
        ->from('pelanggan')
        ->join('users','users.id = pelanggan.user_id')
        ->join('transaksi','transaksi.pelanggan_id = pelanggan.id','left')
        ->group_by('pelanggan.id')
        ->order_by('pelanggan.id','DESC')
        ->get()
        ->result();

    $this->load->view('admin/template/header',$data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/pelanggan/index',$data);
    $this->load->view('admin/template/footer');
}
    public function tambah()
{
    if($this->input->post())
    {
        $user = [
            'nama'     => $this->input->post('nama'),
            'email'    => $this->input->post('email'),
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'role'     => 'customer'
        ];

        $this->db->insert('users',$user);

        $user_id = $this->db->insert_id();

        $pelanggan = [
            'user_id' => $user_id,
            'telepon' => $this->input->post('telepon'),
            'alamat'  => $this->input->post('alamat')
        ];

        $this->db->insert('pelanggan',$pelanggan);

        $this->session->set_flashdata(
            'success',
            'Data pelanggan berhasil ditambahkan'
        );

        redirect('admin/pelanggan');
    }

    $data['title'] = 'Tambah Pelanggan';

    $this->load->view('admin/template/header',$data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/pelanggan/tambah');
    $this->load->view('admin/template/footer');
}
public function edit($id)
{
    $data['pelanggan'] = $this->db
        ->select('pelanggan.*, users.nama, users.email')
        ->from('pelanggan')
        ->join('users','users.id = pelanggan.user_id')
        ->where('pelanggan.id',$id)
        ->get()
        ->row();

    if(!$data['pelanggan'])
    {
        show_404();
    }

    if($this->input->post())
    {
        $this->db
            ->where('id',$data['pelanggan']->user_id)
            ->update('users',[
                'nama'  => $this->input->post('nama'),
                'email' => $this->input->post('email')
            ]);

        $this->db
            ->where('id',$id)
            ->update('pelanggan',[
                'telepon' => $this->input->post('telepon'),
                'alamat'  => $this->input->post('alamat')
            ]);

        $this->session->set_flashdata(
            'success',
            'Data pelanggan berhasil diubah'
        );

        redirect('admin/pelanggan');
    }

    $data['title'] = 'Edit Pelanggan';

    $this->load->view('admin/template/header',$data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/pelanggan/edit',$data);
    $this->load->view('admin/template/footer');
}
public function hapus($id)
{
    $pelanggan = $this->db
        ->where('id',$id)
        ->get('pelanggan')
        ->row();

    if(!$pelanggan)
    {
        show_404();
    }

    $this->db
        ->where('id',$pelanggan->user_id)
        ->delete('users');

    $this->db
        ->where('id',$id)
        ->delete('pelanggan');

    redirect('admin/pelanggan');
}

}
