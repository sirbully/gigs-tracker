<?php
class Musician_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_musicians()
    {
        $this->db->get('users');
    }
}
