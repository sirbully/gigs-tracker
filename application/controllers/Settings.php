<?php

class Settings extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/settings');
        $this->load->view('templates/footer');
    }
}
