<?php
class Gigs extends CI_Controller
{
    public function index()
    {
        $data['gigs'] = $this->gig_model->get_gigs();

        $this->load->view('templates/header');
        $this->load->view('gigs/index', $data);
        $this->load->view('templates/footer');
    }
}
