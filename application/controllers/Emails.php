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
        $data = $this->session->flashdata('data');

        $this->load->config('email');

        $this->email->set_newline("\r\n");
        $this->email->from($this->config->item('smtp_user'), 'Mister Shakes');
        $this->email->to($data['email']);
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
