<?php
class Member_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $result = $this->db->get('users');

        if ($result->num_rows() == 1) {
            return $result->row(0);
        } else {
            return false;
        }
    }

    public function get_musician($id)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }
}
