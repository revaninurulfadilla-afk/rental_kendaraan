<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }

        $this->load->model('Penyewaan_model');
    }

    public function sewa($kendaraan_id)
    {
        $data['title'] = 'Form Penyewaan';

        $data['kendaraan'] =
            $this->Penyewaan_model->get_kendaraan($kendaraan_id);

        if(!$data['kendaraan'])
        {
            show_404();
        }

        $data['supir'] =
            $this->Penyewaan_model->get_supir();

        $data['pelanggan'] =
            $this->Penyewaan_model->get_pelanggan(
                $this->session->userdata('id_user')
            );

        $this->load->view('customer/template/header',$data);
        $this->load->view('customer/template/navbar');
        $this->load->view('customer/penyewaan_form',$data);
        $this->load->view('customer/template/footer');
        $this->load->view('customer/template/script');
    }

    public function simpan()
    {
        $kendaraan_id = $this->input->post('kendaraan_id');

        $kendaraan =
            $this->Penyewaan_model->get_kendaraan($kendaraan_id);

        if(!$kendaraan)
        {
            show_404();
        }

        $pelanggan =
            $this->Penyewaan_model->get_pelanggan(
                $this->session->userdata('id_user')
            );

        if(!$pelanggan)
        {
            show_error('Data pelanggan tidak ditemukan');
        }

        if($kendaraan->status != 'tersedia')
{
    // Hanya pelanggan lama yang mendapat upgrade
    if($pelanggan->is_pelanggan_lama != 1)
    {
        $this->session->set_flashdata(
            'error',
            'Kendaraan tidak tersedia.'
        );

        redirect('customer/kendaraan');
    }

    $pengganti = $this->db
        ->where('status','tersedia')
        ->where('kelas_level >', $kendaraan->kelas_level)
        ->order_by('kelas_level','ASC')
        ->get('kendaraan')
        ->row();

    if(!$pengganti)
    {
        $this->session->set_flashdata(
            'error',
            'Tidak ada kendaraan pengganti yang tersedia.'
        );

        redirect('customer/kendaraan');
    }

    // upgrade kendaraan
    $kendaraan_id = $pengganti->id;

    $this->session->set_flashdata(
        'success',
        'Kendaraan di-upgrade ke '.$pengganti->merk.' '.$pengganti->nama_kendaraan
    );
}

        $jenis_sewa = $this->input->post('jenis_sewa');
        $lama_sewa  = (int)$this->input->post('lama_sewa');

        if($jenis_sewa == 'jam' && $lama_sewa < 3)
        {
            $this->session->set_flashdata(
                'error',
                'Minimal penyewaan 3 jam'
            );

            redirect('customer/penyewaan/sewa/'.$kendaraan_id);
        }

        switch($jenis_sewa)
        {
            case 'jam':
                $tarif = $kendaraan->tarif_jam;
            break;

            case 'hari':
                $tarif = $kendaraan->tarif_hari;
            break;

            case 'minggu':
                $tarif = $kendaraan->tarif_minggu;
            break;

            case 'bulan':
                $tarif = $kendaraan->tarif_bulan;
            break;

            default:
                $tarif = 0;
        }

        $subtotal = $tarif * $lama_sewa;

        /*
        |--------------------------------------------------------------------------
        | Diskon Lama Sewa
        |--------------------------------------------------------------------------
        */

        $diskon = 0;

        if($jenis_sewa == 'hari')
        {
            if($lama_sewa >= 30)
            {
                $diskon = 15;
            }
            elseif($lama_sewa >= 14)
            {
                $diskon = 10;
            }
            elseif($lama_sewa >= 7)
            {
                $diskon = 5;
            }
        }

        elseif($jenis_sewa == 'minggu')
        {
            if($lama_sewa >= 4)
            {
                $diskon = 10;
            }
            elseif($lama_sewa >= 2)
            {
                $diskon = 5;
            }
        }

        elseif($jenis_sewa == 'bulan')
        {
            if($lama_sewa >= 6)
            {
                $diskon = 15;
            }
            elseif($lama_sewa >= 3)
            {
                $diskon = 10;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Bonus Diskon Pelanggan Lama
        |--------------------------------------------------------------------------
        */

        if($pelanggan->is_pelanggan_lama == 1)
        {
            $diskon += 5;
        }

        $potongan =
            ($subtotal * $diskon) / 100;

        $biaya_sewa =
            $subtotal - $potongan;

        /*
        |--------------------------------------------------------------------------
        | Biaya Antar
        |--------------------------------------------------------------------------
        */

        $biaya_antar = 0;

        if($this->input->post('ambil_kendaraan') == 'diantar')
        {
            $biaya_antar = 50000;
        }

        /*
        |--------------------------------------------------------------------------
        | Biaya Luar Kota
        |--------------------------------------------------------------------------
        */

        $biaya_luar_kota = 0;

        if($this->input->post('tujuan') == 'luar_kota')
        {
            $biaya_luar_kota =
                $biaya_sewa * 20 / 100;
        }

        /*
        |--------------------------------------------------------------------------
        | Total Bayar
        |--------------------------------------------------------------------------
        */

        $total_bayar =
            $biaya_sewa +
            $biaya_antar +
            $biaya_luar_kota;

        $data = array(

            'kode_transaksi' =>
                'TRX'.date('YmdHis'),

            'user_id' =>
                $this->session->userdata('id_user'),

            'pelanggan_id' =>
                $pelanggan->id,

            'kendaraan_id' =>
                $kendaraan_id,

            'supir_id' =>
                !empty($this->input->post('supir_id'))
                ? $this->input->post('supir_id')
                : NULL,

            'jenis_sewa' =>
                $jenis_sewa,

            'lama_sewa' =>
                $lama_sewa,

            'tgl_mulai' =>
                $this->input->post('tgl_mulai'),

            'tgl_selesai' =>
                $this->input->post('tgl_selesai'),

            'tujuan' =>
                $this->input->post('tujuan'),

            'ambil_kendaraan' =>
                $this->input->post('ambil_kendaraan'),

            'biaya_sewa' =>
                $biaya_sewa,

            'diskon_persen' =>
                $diskon,

            'potongan' =>
                $potongan,

            'biaya_antar' =>
                $biaya_antar,

            'biaya_luar_kota' =>
                $biaya_luar_kota,

            'total_bayar' =>
                $total_bayar,

            'status' =>
                'booking',

            'created_at' =>
                date('Y-m-d H:i:s')
        );

        $this->Penyewaan_model
            ->simpan_transaksi($data);

        $this->db
            ->where('id',$kendaraan_id)
            ->update('kendaraan',[
                'status' => 'disewa'
            ]);

        $this->session->set_flashdata(
            'success',
            'Penyewaan berhasil dibuat'
        );

        redirect('customer/pembayaran');
    }
    
    public function index()
{
    $data['title'] = 'Penyewaan Saya';

    $data['transaksi'] = $this->db
        ->select('transaksi.*, kendaraan.merk')
        ->from('transaksi')
        ->join('kendaraan','kendaraan.id = transaksi.kendaraan_id')
        ->where(
            'transaksi.user_id',
            $this->session->userdata('id_user')
        )
        ->order_by('transaksi.id','DESC')
        ->get()
        ->result();

    $this->load->view('customer/template/header',$data);
    $this->load->view('customer/template/navbar');
    $this->load->view('customer/penyewaan',$data);
    $this->load->view('customer/template/footer');
    $this->load->view('customer/template/script');
}
}