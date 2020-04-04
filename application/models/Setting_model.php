<?php
class Setting_model extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function get_user_info()
    {
        $query = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')));
        return $query->row_array();
    }

    public function update($where)
    {
        $this->db->where('id', $this->session->userdata('user_id'));
        return $this->db->update('users', $where);
    }
}
