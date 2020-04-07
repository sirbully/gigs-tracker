<?php
class Activity_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_activity()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('notifications');
        return $query->result_array();
    }

    public function get_activity_musician()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where('notifications', array('user_id' => $this->session->userdata('user_id')));
        return $query->result_array();
    }

    public function new_user($name)
    {
        $notif = array(
            'message' => 'Added new user: ' . $name,
            'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('notifications', $notif);
    }

    public function remove_user($id)
    {
        $query = $this->musician_model->get_musicians($id);
        return $this->db->insert('notifications', 'Revoked access from user: ' . $query['name']);
    }

    public function cancel_gig($notif)
    {
        return $this->db->insert('notifications', $notif);
    }

    public function decide_status($id, $status)
    {
        $new_status = $status == 1 ? 'accepted' : 'rejected';
        $query = $this->gig_model->get_gig_musician($id, $this->session->userdata('user_id'));
        $the_date = date_format(new DateTime($query['date']), 'M jS, Y');
        $notif = array(
            'message' => $this->session->userdata('user_name') . ' have ' . $new_status . ' the following gig: [' . $the_date . '] ' . $query['type'],
            'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('notifications', $notif);
    }
}
