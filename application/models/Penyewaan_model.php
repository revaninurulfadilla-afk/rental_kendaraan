<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan_model extends CI_Model {

    public function get_kendaraan($id)
    {
        return $this->db
            ->where('id',$id)
            ->get('kendaraan')
            ->row();
    }

    public function get_supir()
    {
        return $this->db
            ->get('supir')
            ->result();
    }

    public function get_pelanggan($user_id)
    {
        return $this->db
            ->where('user_id',$user_id)
            ->get('pelanggan')
            ->row();
    }

    public function simpan_transaksi($data)
    {
        return $this->db
            ->insert('transaksi',$data);
    }

    public function update_status_kendaraan($id)
    {
        return $this->db
            ->where('id',$id)
            ->update('kendaraan',[
                'status' => 'disewa'
            ]);
    }
}