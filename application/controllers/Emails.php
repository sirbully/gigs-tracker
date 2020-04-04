<?php

class Emails extends CI_Controller
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

    public function send_welcome()
    {
        $this->load->config('email');

        $data['name'] = $this->input->post('name');
        $data['password'] = $this->input->post('password');

        $this->email->set_newline("\r\n");
        $this->email->from($this->config->item('smtp_user'), 'Mister Shakes');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Welcome!');
        $this->email->message($this->load->view('emails/add_user', $data, true));

        if ($this->email->send()) {
            $this->session->set_flashdata('add-user', "The musician was successfully added!");
            redirect('musicians');
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function password_generator()
    {
        // generate pass
    }
}
