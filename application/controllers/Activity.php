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
        $this->load->view('templates/header');
        $this->load->view('templates/activity');
        $this->load->view('templates/footer');
    }
}
