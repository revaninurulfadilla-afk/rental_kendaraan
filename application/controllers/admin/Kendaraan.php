<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller
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
    $data['title'] = 'Data Kendaraan';

    $jenis  = $this->input->get('jenis');
    $kelas  = $this->input->get('kelas');
    $status = $this->input->get('status');

    $this->db->from('kendaraan');

    if($jenis != '')
    {
        $this->db->where('jenis', $jenis);
    }

    if($kelas != '')
    {
        $this->db->where('kelas', $kelas);
    }

    if($status != '')
    {
        $this->db->where('status', $status);
    }

    $data['kendaraan'] = $this->db
        ->order_by('id','DESC')
        ->get()
        ->result();

    $this->load->view('admin/template/header',$data);
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/kendaraan/index',$data);
    $this->load->view('admin/template/footer');
}
    public function tambah()
    {
        if($this->input->post())
        {
            $foto = '';

            if(!empty($_FILES['foto']['name']))
            {
                $config['upload_path']   = './assets/customer/images/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name']  = TRUE;

                $this->load->library('upload',$config);

                if($this->upload->do_upload('foto'))
                {
                    $foto = $this->upload->data('file_name');
                }
            }

            $data = [
                'kode_kendaraan' => $this->input->post('kode_kendaraan'),
                'merk' => $this->input->post('merk'),
                'nama_kendaraan' => $this->input->post('nama_kendaraan'),
                'jenis' => $this->input->post('jenis'),
                'kelas' => $this->input->post('kelas'),
                'tahun' => $this->input->post('tahun'),
                'no_polisi' => $this->input->post('no_polisi'),
                'warna' => $this->input->post('warna'),
                'tarif_jam' => $this->input->post('tarif_jam'),
                'tarif_hari' => $this->input->post('tarif_hari'),
                'tarif_minggu' => $this->input->post('tarif_minggu'),
                'tarif_bulan' => $this->input->post('tarif_bulan'),
                'denda_per_jam' => $this->input->post('denda_per_jam'),
                'status' => $this->input->post('status'),
                'foto' => $foto,
                'deskripsi' => $this->input->post('deskripsi'),
                'kelas_level' => $this->input->post('kelas_level'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('kendaraan',$data);

            $this->session->set_flashdata(
                'success',
                'Data kendaraan berhasil ditambahkan'
            );

            redirect('admin/kendaraan');
        }

        $data['title'] = 'Tambah Kendaraan';

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/kendaraan/tambah');
        $this->load->view('admin/template/footer');
    }

    public function edit($id)
    {
        $data['kendaraan'] = $this->db
            ->where('id',$id)
            ->get('kendaraan')
            ->row();

        if(!$data['kendaraan'])
        {
            show_404();
        }

        if($this->input->post())
        {
            $foto = $data['kendaraan']->foto;

            if(!empty($_FILES['foto']['name']))
            {
                $config['upload_path']   = './assets/customer/images/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['encrypt_name']  = TRUE;

                $this->load->library('upload',$config);

                if($this->upload->do_upload('foto'))
                {
                    if(!empty($foto))
                    {
                        @unlink('./assets/customer/images/'.$foto);
                    }

                    $foto = $this->upload->data('file_name');
                }
            }

            $update = [
                'kode_kendaraan' => $this->input->post('kode_kendaraan'),
                'merk' => $this->input->post('merk'),
                'nama_kendaraan' => $this->input->post('nama_kendaraan'),
                'jenis' => $this->input->post('jenis'),
                'kelas' => $this->input->post('kelas'),
                'tahun' => $this->input->post('tahun'),
                'no_polisi' => $this->input->post('no_polisi'),
                'warna' => $this->input->post('warna'),
                'tarif_jam' => $this->input->post('tarif_jam'),
                'tarif_hari' => $this->input->post('tarif_hari'),
                'tarif_minggu' => $this->input->post('tarif_minggu'),
                'tarif_bulan' => $this->input->post('tarif_bulan'),
                'denda_per_jam' => $this->input->post('denda_per_jam'),
                'status' => $this->input->post('status'),
                'foto' => $foto,
                'deskripsi' => $this->input->post('deskripsi'),
                'kelas_level' => $this->input->post('kelas_level')
            ];

            $this->db
                ->where('id',$id)
                ->update('kendaraan',$update);

            $this->session->set_flashdata(
                'success',
                'Data kendaraan berhasil diubah'
            );

            redirect('admin/kendaraan');
        }

        $data['title'] = 'Edit Kendaraan';

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/kendaraan/edit',$data);
        $this->load->view('admin/template/footer');
    }

    public function detail($id)
    {
        $data['kendaraan'] = $this->db
            ->where('id',$id)
            ->get('kendaraan')
            ->row();

        if(!$data['kendaraan'])
        {
            show_404();
        }

        $data['title'] = 'Detail Kendaraan';

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/kendaraan/detail',$data);
        $this->load->view('admin/template/footer');
    }

    public function hapus($id)
    {
        $kendaraan = $this->db
            ->where('id',$id)
            ->get('kendaraan')
            ->row();

        if(!$kendaraan)
        {
            show_404();
        }

        if(!empty($kendaraan->foto))
        {
            @unlink('./assets/customer/images/'.$kendaraan->foto);
        }

        $this->db
            ->where('id',$id)
            ->delete('kendaraan');

        $this->session->set_flashdata(
            'success',
            'Data kendaraan berhasil dihapus'
        );

        redirect('admin/kendaraan');
    }
}