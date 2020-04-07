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
            $this->session->set_flashdata('flash', "The musician was successfully added!");
            redirect('musicians');
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function new_gig()
    {
        $this->load->config('email');
        $data = $this->session->flashdata('data');

        foreach ($data['musician'] as $id) {
            $query = $this->member_model->get_musician($id);
            $data['name'] = $query['name'];

            $this->email->set_newline("\r\n");
            $this->email->from($this->config->item('smtp_user'), 'Mister Shakes');
            $this->email->to($query['email']);
            $this->email->subject('You Got A Gig!');
            $this->email->message($this->load->view('emails/new_gig', $data, true));

            if ($this->email->send()) {
                // do nothing
            } else {
                show_error($this->email->print_debugger());
            }
        }
        $this->session->set_flashdata('flash', "A new gig was added!");
        redirect('gigs');
    }

    public function generate_pass()
    {
        $data = $this->session->flashdata('data');
        $this->load->config('email');

        $this->email->set_newline("\r\n");
        $this->email->from($this->config->item('smtp_user'), 'Mister Shakes');
        $this->email->to($data['email']);
        $this->email->subject('Forgot Password?');
        $this->email->message($this->load->view('emails/pass_user', $data, true));

        if ($this->email->send()) {
            $this->session->set_flashdata('flash', "A new password was generated successfully!");
            redirect("musicians");
        } else {
            show_error($this->email->print_debugger());
        }
    }
}
