<?php
class Musician_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_musicians($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get_where('users', array('isAdmin' => 0));
            return $query->result_array();
        }

        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }

    public function new_musician()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );

        return $this->db->insert('users', $data);
    }

    public function edit_musician($id)
    {
        $data = array(
            'password' => $this->input->post('password')
        );

        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_musician($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return true;
    }

    public function check_email($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }
}
