<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('auth');
        }
    }

    // halaman pembayaran
    public function index($id_penyewaan)
{
    $data['sewa'] = $this->db
        ->order_by('id_penyewaan','DESC')
        ->get('penyewaan')
        ->row();

    $this->load->view('customer/pembayaran', $data);
}

    // simpan pembayaran
    public function simpan()
    {
        $id_pembayaran = 'BYR'.date('YmdHis');

        $bukti_transfer = '';

        if(!empty($_FILES['bukti_transfer']['name']))
        {
            $config['upload_path']   = './assets/bukti_transfer/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size']      = 2048;

            $this->load->library('upload',$config);

            if($this->upload->do_upload('bukti_transfer'))
            {
                $bukti_transfer =
                    $this->upload->data('file_name');
            }
        }

        $metode = $this->input->post('metode_pembayaran');

        if($metode == 'Transfer')
        {
            $status_pembayaran = 'Menunggu Verifikasi';
            $status_verifikasi = 'Pending';
        }
        else
        {
            $status_pembayaran = 'Belum Bayar';
            $status_verifikasi = 'Pending';
        }

       $data = [

    'id_pembayaran'      => $id_pembayaran,
    'id_penyewaan'       => $this->input->post('id_penyewaan'),
    'tanggal_bayar'      => date('Y-m-d'),
    'jumlah_bayar'       => $this->input->post('jumlah_bayar'),
    'metode_pembayaran'  => $metode,
    'bukti_transfer'     => $bukti_transfer,
    'status_pembayaran'  => $status_pembayaran,
    'status_verifikasi'  => $status_verifikasi

];

        $this->db->insert('pembayaran', $data);

        echo "
<script>
alert('Data pembayaran berhasil dikirim');
window.location='".site_url('customer/dashboard')."';
</script>
";
    }
    public function riwayat()
{
    $data['pembayaran'] = $this->db
        ->select('pembayaran.*, penyewaan.id_kendaraan')
        ->from('pembayaran')
        ->join('penyewaan','penyewaan.id_penyewaan = pembayaran.id_penyewaan')
        ->order_by('tanggal_bayar','DESC')
        ->get()
        ->result();

    $this->load->view('customer/riwayat_pembayaran',$data);
}

}