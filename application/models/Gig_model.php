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

        $this->db->select('*');
        $this->db->from('gigs');
        $this->db->join('approves', 'approves.gig_id = gigs.id');
        $this->db->where('gigs.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_gig_musician($id)
    {
        $this->db->select('*');
        $this->db->from('approves');
        $this->db->join('gigs', 'gigs.id = approves.gig_id');
        $this->db->join('users', 'users.id = approves.user_id');
        $this->db->where('approves.gig_id', $id);
        $query = $this->db->get();
        return $query->result_array();
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

    public function assign_user($gig, $musician)
    {
        foreach ($musician as $id) {
            $data = array(
                'user_id' => $id,
                'gig_id' => $gig
            );

            $this->db->insert('approves', $data);
        }
        return true;
    }

    public function update_assign($gig, $musician)
    {
        $this->db->where('gig_id', $gig);
        $this->db->delete('approves');

        foreach ($musician as $id) {
            $data = array(
                'user_id' => $id,
                'gig_id' => $gig
            );

            $this->db->insert('approves', $data);
        }
        return true;
    }

    public function decide_status()
    {
        //
    }

    public function delete_gig($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('gigs');
        return true;
    }
}
