<?php

class Musicians extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('isloggedin')) {
            redirect('members');
        } elseif (!$this->session->userdata('isAdmin')) {
            show_404();
        }
    }

    public function index()
    {
        $data['musicians'] = $this->musician_model->get_musicians();

        $this->load->view('templates/header');
        $this->load->view('musicians/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email');
        $this->form_validation->set_rules('password', 'Password');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('musicians/create');
            $this->load->view('templates/footer');
        } else {
            $this->musician_model->new_musician();
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $this->session->set_flashdata('data', $data);
            redirect("emails/send_welcome");
        }
    }

    public function edit($id)
    {
        $this->musician_model->edit_musician($id);
        $user = $this->musician_model->get_musicians($id);

        $data = array(
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => $this->input->post('password')
        );
        $this->session->set_flashdata('data', $data);
        redirect("emails/generate_pass");
    }

    public function delete($id)
    {
        $this->musician_model->delete_musician($id);
        $this->session->set_flashdata('delete-user', "The musician was successfully removed!");
        redirect("musicians");
    }

    public function check_email($email)
    {
        $this->form_validation->set_message('check_email', 'This email has already been registered.');
        if ($this->musician_model->check_email($email)) {
            return true;
        } else {
            return false;
        }
    }
}
