<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getUserByEmail($email)
    {
        return $this->db
            ->where('email',$email)
            ->get('users')
            ->row();
    }

    public function insertUser($data)
    {
        $this->db->insert(
            'users',
            $data
        );

        return $this->db->insert_id();
    }

    public function insertPelanggan($data)
    {
        return $this->db->insert(
            'pelanggan',
            $data
        );
    }

    public function getPelanggan($user_id)
    {
        return $this->db
            ->select('
                users.*,
                pelanggan.*
            ')
            ->from('users')
            ->join(
                'pelanggan',
                'pelanggan.user_id = users.id'
            )
            ->where(
                'users.id',
                $user_id
            )
            ->get()
            ->row();
    }
}