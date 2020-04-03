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
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('client', 'Client', 'required');
        $this->form_validation->set_rules('dress', 'Dress code', 'required');
        $this->form_validation->set_rules('pay', 'Pay', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('gigs/create');
            $this->load->view('templates/footer');
        } else {
            $this->gig_model->new_gig();
            // $this->session->set_flashdata('success', 1);
            redirect("gigs");
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('client', 'Client', 'required');
        $this->form_validation->set_rules('dress', 'Dress code', 'required');
        $this->form_validation->set_rules('pay', 'Pay', 'required');

        $data['gig'] = $this->gig_model->get_gigs($id);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('gigs/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->gig_model->edit_gig($id);
            // $this->session->set_flashdata('success', 1);
            redirect("gigs");
        }
    }

    public function delete($id)
    {
        $this->gig_model->delete_gig($id);
        // $this->session->set_flashdata('success', 1);
        redirect("gigs");
    }
}
