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
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('gigs');
            return $query->result_array();
        }

        $query = $this->db->get_where('gigs', array('id' => $id));
        return $query->row_array();
    }

    public function new_gig()
    {
        $data = array(
            'date' => $this->input->post('date'),
            'type' => $this->input->post('type'),
            'location' => $this->input->post('location'),
            'client' => $this->input->post('client'),
            'dress' => $this->input->post('dress'),
            'pay' => $this->input->post('pay')
        );

        return $this->db->insert('gigs', $data);
    }

    public function edit_gig($id)
    {
        $data = array(
            'date' => $this->input->post('date'),
            'type' => $this->input->post('type'),
            'location' => $this->input->post('location'),
            'client' => $this->input->post('client'),
            'dress' => $this->input->post('dress'),
            'pay' => $this->input->post('pay')
        );

        $this->db->where('id', $id);
        return $this->db->update('gigs', $data);
    }

    public function delete_gig($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('gigs');
        return true;
    }
}
