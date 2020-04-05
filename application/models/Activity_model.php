<?php
class Activity_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_activity()
    {
        $query = $this->db->get('notifications');
        return $query->result_array();
    }

    public function get_activity_musician()
    {
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

    public function cancel_gig($notif)
    {
        return $this->db->insert('notifications', $notif);
    }

    public function decide_status($id, $status)
    {
        $new_status = $status == 1 ? 'accepted' : 'rejected';
        $query = $this->gig_model->get_gigs($id);
        $notif = array(
            'message' => $this->session->userdata('user_name') . ' have ' . $new_status . ' the following gig: [' . date_format(new DateTime($query['date']), 'M jS, Y') . '] ' . $query['type'] . '',
            'user_id' => $this->session->userdata('user_id')
        );

        return $this->db->insert('notifications', $notif);
    }
}
