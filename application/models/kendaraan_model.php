<?php
class Kendaraan_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('kendaraan')->result();
    }

}