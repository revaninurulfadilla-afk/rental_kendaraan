<?php

class Penyewaan_model extends CI_Model {

    public function getByPelanggan($id_pelanggan)
    {
        return $this->db
            ->where('id_pelanggan',$id_pelanggan)
            ->get('penyewaan')
            ->result();
    }

}