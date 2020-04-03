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

    public function view($id = NULL)
    {
        $data['gig'] = $this->gig_model->get_gigs($id);

        if (empty($data['gig'])) {
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('gigs/view', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->load->view('templates/header');
        $this->load->view('gigs/create');
        $this->load->view('templates/footer');
    }
}
