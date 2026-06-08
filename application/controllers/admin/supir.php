<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supir extends CI_Controller
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
        $data['title'] = 'Data Supir';

        $data['supir'] = $this->db
            ->order_by('id','DESC')
            ->get('supir')
            ->result();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/supir/index',$data);
        $this->load->view('admin/template/footer');
    }

    public function tambah()
    {
        if($this->input->post())
        {
            $data = [
                'nama'     => $this->input->post('nama'),
                'telepon'  => $this->input->post('telepon'),
                'alamat'   => $this->input->post('alamat'),
                'sim'      => $this->input->post('sim'),
                'status'   => 'tersedia'
            ];

            $this->db->insert('supir',$data);

            $this->session->set_flashdata(
                'success',
                'Data supir berhasil ditambahkan'
            );

            redirect('admin/supir');
        }

        $data['title'] = 'Tambah Supir';

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/supir/tambah');
        $this->load->view('admin/template/footer');
    }

    public function edit($id)
    {
        $data['supir'] = $this->db
            ->where('id',$id)
            ->get('supir')
            ->row();

        if(!$data['supir'])
        {
            show_404();
        }

        if($this->input->post())
        {
            $update = [
                'nama'     => $this->input->post('nama'),
                'telepon'  => $this->input->post('telepon'),
                'alamat'   => $this->input->post('alamat'),
                'sim'      => $this->input->post('sim'),
                'status'   => $this->input->post('status')
            ];

            $this->db->where('id',$id);
            $this->db->update('supir',$update);

            $this->session->set_flashdata(
                'success',
                'Data supir berhasil diubah'
            );

            redirect('admin/supir');
        }

        $data['title'] = 'Edit Supir';

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/supir/edit',$data);
        $this->load->view('admin/template/footer');
    }

    public function hapus($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('supir');

        $this->session->set_flashdata(
            'success',
            'Data supir berhasil dihapus'
        );

        redirect('admin/supir');
    }
}