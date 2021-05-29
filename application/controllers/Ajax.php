<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    public function edit_user()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $user = $this->db->get_where('users', ['id' => $id])->row();
            echo json_encode($user);
        } else {
            redirect('eror');
        }
    }
    public function edit_edu()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $user = $this->db->get_where('educations', ['id_user' => $id])->row();
            echo json_encode($user);
        } else {
            redirect('eror');
        }
    }
    public function edit_empl()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $user = $this->db->get_where('employments', ['id_user' => $id])->row();
            echo json_encode($user);
        } else {
            redirect('eror');
        }
    }
}
