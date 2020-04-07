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
        $this->form_validation->set_rules('sched', 'Schedule', 'required');
        $this->form_validation->set_rules('pay', 'Pay', 'required');
        $this->form_validation->set_rules('musician[]', null, 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('gigs/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->config('upload');
            $this->load->library('upload');
            if ($this->upload->do_upload('songnotes')) {
                $file = $this->upload->data('file_name');
            }
            $this->gig_model->new_gig($file);

            $data = array(
                'gig' => $this->db->insert_id(),
                'musician' => $this->input->post('musician')
            );

            $this->gig_model->assign_user($this->db->insert_id(), $this->input->post('musician'));
            $this->session->set_flashdata('data', $data);
            redirect("emails/new_gig");
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
        $this->form_validation->set_rules('sched', 'Schedule', 'required');
        $this->form_validation->set_rules('pay', 'Pay', 'required');
        $this->form_validation->set_rules('musician[]', null, 'required');

        $data['gig'] = $this->gig_model->get_gigs($id);
        $data['musicians'] = $this->musician_model->get_musicians();

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('gigs/edit', $data);
            $this->load->view('templates/footer');
        } else {
            if ($_FILES['songnotes']['size'] == 0) {
                $this->gig_model->edit_gig($id);
            } else {
                $this->load->config('upload');
                $this->load->library('upload');
                if ($this->upload->do_upload('songnotes')) {
                    $file = $this->upload->data('file_name');
                }
                $this->gig_model->edit_gig($id, $file);
            }

            $this->gig_model->update_assign($id, $this->input->post('musician'));

            $this->session->set_flashdata('flash', "The gig was successfully updated!");
            redirect("gigs/$id");
        }
    }

    public function delete($id)
    {
        if (!$this->session->userdata('isAdmin')) {
            show_404();
        }

        $gig = $this->gig_model->get_gig_musicians($id);

        foreach ($gig as $g) {
            $notif = array(
                'message' => 'The gig with the following details was cancelled: [' . date_format(new DateTime($g['date']), 'M jS, Y') . '] ' . $g['type'],
                'user_id' => $g['user_id']
            );

            $this->activity_model->cancel_gig($notif);
        }

        unlink('uploads/' . $gig[0]['file']);
        $this->gig_model->delete_gig($id);
        $this->session->set_flashdata('flash', "The gig was successfully deleted!");
        redirect("gigs");
    }

    public function remove_file($file, $id)
    {
        $this->gig_model->delete_file($id);
        unlink('uploads/' . $file);
        $this->session->set_flashdata('flash', "The file was successfully deleted!");
        redirect("gigs/edit/$id");
    }

    public function accept($id)
    {
        $this->gig_model->decide_status($id, 1);
        $this->activity_model->decide_status($id, 1);
        $this->session->set_flashdata('decide-gig', "You've accepted the gig!");
        redirect("gigs/$id");
    }

    public function reject($id)
    {
        $this->gig_model->decide_status($id, 0);
        $this->activity_model->decide_status($id, 0);
        $this->session->set_flashdata('decide-gig', "You've rejected the gig!");
        redirect("gigs/$id");
    }
}
