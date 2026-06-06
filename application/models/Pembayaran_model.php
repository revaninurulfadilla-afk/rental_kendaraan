<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    public function get_transaksi_user($user_id)
    {
        return $this->db
            ->select('transaksi.*, kendaraan.merk, kendaraan.nama_kendaraan')
            ->from('transaksi')
            ->join('kendaraan','kendaraan.id=transaksi.kendaraan_id')
            ->where('transaksi.user_id',$user_id)
            ->where('transaksi.status','booking')
            ->order_by('transaksi.id','DESC')
            ->get()
            ->result();
    }

    public function get_transaksi($id)
    {
        return $this->db
            ->where('id',$id)
            ->get('transaksi')
            ->row();
    }

    public function simpan_pembayaran($data)
    {
        return $this->db->insert('pembayaran',$data);
    }
}