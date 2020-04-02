<?php
class NotFound extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->output->set_status_header('404');
        $this->load->view('templates/header');
        $this->load->view('templates/notfound');
        $this->load->view('templates/footer');
    }
}
