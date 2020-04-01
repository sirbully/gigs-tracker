<?php
class Gig_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_gigs($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('gigs');
            return $query->result_array();
        }

        $query = $this->db->get_where('gigs', array('id' => $id));
        return $query->row_array();
    }
}
