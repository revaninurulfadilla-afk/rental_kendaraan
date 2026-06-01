<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function get_kendaraan()
    {
        return $this->db->get('kendaraan')->result();
    }

}