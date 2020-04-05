<?php

class Activity extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('isloggedin')) {
            redirect('members');
        }
    }

    public function index()
    {
        if ($this->session->userdata('isAdmin')) {
            $data['activity'] = $this->activity_model->get_activity();
        } else {
            $data['activity'] = $this->activity_model->get_activity_musician();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/activity', $data);
        $this->load->view('templates/footer');
    }
}
