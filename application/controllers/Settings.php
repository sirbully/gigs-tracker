<?php

class Settings extends CI_Controller
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
        $this->load->view('templates/settings');
        $this->load->view('templates/footer');
    }
}
