<?php

class Musicians extends CI_Controller
{
    public function index()
    {
        $data['musician'] = $this->musician_model->get_musicians();

        $this->load->view('templates/header');
        $this->load->view('musicians/index', $data);
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
            $this->load->view('musicians/create');
            $this->load->view('templates/footer');
        } else {
            $this->musician_model->new_musician();
            $this->session->set_flashdata('success', 1);
            redirect("musicians");
        }
    }

    public function delete($id)
    {
        $this->musician_model->delete_musician($id);
        $this->session->set_flashdata('success', 1);
        redirect("musicians");
    }
}
