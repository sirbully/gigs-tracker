<?php
class Members extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/login');
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/login');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->member_model->login($email, $password);

            if ($user->id) {
                $user_data = array(
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'isAdmin' => $user->isAdmin,
                    'isloggedin' => true
                );

                $this->session->set_userdata($user_data);

                $this->session->set_flashdata('login-success', "You are now logged in");
                redirect("gigs");
            } else {
                $this->session->set_flashdata('login-fail', "Invalid login credentials");
                redirect("members");
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('isAdmin');
        $this->session->unset_userdata('isloggedin');

        $this->session->set_flashdata('logout', "You have logged out");
        redirect("members");
    }
}
