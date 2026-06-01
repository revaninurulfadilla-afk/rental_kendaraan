<?php
class Kendaraan_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('kendaraan')->result();
    }

    public function detail($id)
{
    return $this->db
        ->get_where('kendaraan',[
            'id_kendaraan' => $id
        ])
        ->row();
}
}