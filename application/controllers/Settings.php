<?php

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('isloggedin')) {
            redirect('members');
        }
    }

    public function index()
    {
        $data['user'] = $this->setting_model->get_user_info();

        $this->load->view('templates/header');
        $this->load->view('templates/settings', $data);
        $this->load->view('templates/footer');
    }

    public function update_name()
    {
        $data['user'] = $this->setting_model->get_user_info();
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/settings', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setting_model->update(array('name' => $this->input->post('name')));
            $this->session->set_flashdata('settings', "You were logged out for updating your settings.");
            redirect("members/logout");
        }
    }

    public function update_email()
    {
        $data['user'] = $this->setting_model->get_user_info();
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/settings', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setting_model->update(array('email' => $this->input->post('email')));
            $this->session->set_flashdata('settings', "You were logged out for updating your settings.");
            redirect("members/logout");
        }
    }

    public function update_password()
    {
        $data['user'] = $this->setting_model->get_user_info();
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/settings', $data);
            $this->load->view('templates/footer');
        } else {
            $this->setting_model->update(array('password' => $this->input->post('password')));
            $this->session->set_flashdata('settings', "You were logged out for updating your settings.");
            redirect("members/logout");
        }
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
