<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // LOGIN
    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));

        return $this->db->get('users')->row();
    }
    // REGISTER CUSTOMER
    public function register($data)
    {
        return $this->db->insert('users', $data);
    }
    // CEK EMAIL
    public function cek_email($email)
    {
        $this->db->where('email', $email);

        return $this->db->get('users')->row();
    }
    // AMBIL SEMUA USER
    public function get_all_user()
    {
        return $this->db->get('users')->result();
    }
    // AMBIL USER BERDASARKAN ID
    public function get_user_by_id($id)
    {
        $this->db->where('id', $id);

        return $this->db->get('users')->row();
    }
    // UPDATE USER
    public function update_user($id, $data)
    {
        $this->db->where('id', $id);

        return $this->db->update('users', $data);
    }
    // HAPUS USER
    public function delete_user($id)
    {
        $this->db->where('id', $id);

        return $this->db->delete('users');
    }

}