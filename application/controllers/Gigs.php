<?php
class Gigs extends CI_Controller
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
            $data['gigs'] = $this->gig_model->get_gigs();
        } else {
            $data['gigs'] = $this->gig_model->get_gigs_musician($this->session->userdata('user_id'));
        }

        $this->load->view('templates/header');
        $this->load->view('gigs/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = NULL)
    {
        if ($this->session->userdata('isAdmin')) {
            $data['gig'] = $this->gig_model->get_gig_musicians($id);
        } else {
            $data['gig'] = $this->gig_model->get_gig_musician($id, $this->session->userdata('user_id'));
        }

        if (empty($data['gig'])) {
            show_404();
        }

        $this->load->view('templates/header');
        if ($this->session->userdata('isAdmin')) {
            $this->load->view('gigs/view', $data);
        } else {
            $this->load->view('gigs/view2', $data);
        }
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['musicians'] = $this->musician_model->get_musicians();

        if (!$this->session->userdata('isAdmin')) {
            show_404();
        }

        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('client', 'Client', 'required');
        $this->form_validation->set_rules('dress', 'Dress code', 'required');
        $this->form_validation->set_rules('pay', 'Pay', 'required');
        $this->form_validation->set_rules('musician[]', null, 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('gigs/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->gig_model->new_gig();
            $this->gig_model->assign_user($this->db->insert_id(), $this->input->post('musician'));

            $this->session->set_flashdata('create-gig', "The gig was successfully added!");
            redirect("gigs");
        }
    }

    public function edit($id)
    {
        if (!$this->session->userdata('isAdmin')) {
            show_404();
        }

        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('client', 'Client', 'required');
        $this->form_validation->set_rules('dress', 'Dress code', 'required');
        $this->form_validation->set_rules('pay', 'Pay', 'required');
        $this->form_validation->set_rules('musician[]', null, 'required');

        $data['gig'] = $this->gig_model->get_gigs($id);
        $data['musicians'] = $this->musician_model->get_musicians();

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('gigs/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->gig_model->edit_gig($id);
            $this->gig_model->update_assign($id, $this->input->post('musician'));

            $this->session->set_flashdata('edit-gig', "The gig was successfully updated!");
            redirect("gigs/$id");
        }
    }

    public function delete($id)
    {
        if (!$this->session->userdata('isAdmin')) {
            show_404();
        }

        $this->gig_model->delete_gig($id);
        $this->session->set_flashdata('delete-gig', "The gig was successfully deleted!");
        redirect("gigs");
    }

    public function accept($id)
    {
        $this->gig_model->decide_status($id, 1);
        $this->session->set_flashdata('decide-gig', "You've accepted the gig!");
        redirect("gigs/$id");
    }

    public function reject($id)
    {
        $this->gig_model->decide_status($id, 0);
        $this->session->set_flashdata('decide-gig', "You've rejected the gig!");
        redirect("gigs/$id");
    }
}
