<?php

class Activity extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/activity');
        $this->load->view('templates/footer');
    }
}
