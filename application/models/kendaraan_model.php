<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{
    private $table = 'kendaraan';

    /*
    |--------------------------------------------------------------------------
    | GET ALL KENDARAAN
    |--------------------------------------------------------------------------
    */

    public function get_all()
    {
        return $this->db
            ->order_by('id', 'DESC')
            ->get($this->table)
            ->result();
    }

    /*
    |--------------------------------------------------------------------------
    | GET KENDARAAN TERSEDIA
    |--------------------------------------------------------------------------
    */

    public function get_available()
    {
        return $this->db
            ->where('status', 'tersedia')
            ->order_by('id', 'DESC')
            ->get($this->table)
            ->result();
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL KENDARAAN
    |--------------------------------------------------------------------------
    */

    public function detail($id)
    {
        return $this->db
            ->where('id', $id)
            ->get($this->table)
            ->row();
    }

    /*
    |--------------------------------------------------------------------------
    | INSERT
    |--------------------------------------------------------------------------
    */

    public function insert($data)
    {
        return $this->db->insert(
            $this->table,
            $data
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update($id, $data)
    {
        return $this->db
            ->where('id', $id)
            ->update(
                $this->table,
                $data
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        return $this->db
            ->where('id', $id)
            ->delete($this->table);
    }

    /*
    |--------------------------------------------------------------------------
    | TOTAL KENDARAAN
    |--------------------------------------------------------------------------
    */

    public function total()
    {
        return $this->db
            ->count_all($this->table);
    }

    /*
    |--------------------------------------------------------------------------
    | TOTAL TERSEDIA
    |--------------------------------------------------------------------------
    */

    public function total_tersedia()
    {
        return $this->db
            ->where('status', 'tersedia')
            ->count_all_results($this->table);
    }

    /*
    |--------------------------------------------------------------------------
    | TOTAL DISEWA
    |--------------------------------------------------------------------------
    */

    public function total_disewa()
    {
        return $this->db
            ->where('status', 'disewa')
            ->count_all_results($this->table);
    }
}