<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Users_Models', 'Mduser');
    }
    public function index()
    {
        $data['title'] = "Users";
        $data['user'] = $this->Mduser->edit(['id' => $this->session->userdata('id')], 'users');
        $this->load->view('default/header', $data);
        $this->load->view('default/nav');
        $this->load->view('users/home', $data);
        $this->load->view('default/footer');
    }
    public function user_update()
    {
        $data = [
            'email' => htmlspecialchars($this->input->post('email', true)),
            'name' => $this->input->post('nama'),
            'address' => $this->input->post('alamat'),
            'phone' => $this->input->post('hp'),
        ];

        $this->Mduser->update(['id' => $this->input->post('id')], $data, 'users');

        $this->session->set_flashdata('messege', '<script>alert("Update Entry Success!");</script>');
        redirect('users');
    }
    public function edu()
    {
        $data['title'] = "Education";
        $id = $this->session->userdata('id');
        $user = $this->db->get_where('educations', ['id_user' => $id])->row_array();

        if ($user) {
            $data['edu'] = $this->Mduser->edit(['id_user' => $id], 'educations');
            $this->load->view('default/header', $data);
            $this->load->view('default/nav');
            $this->load->view('users/edu', $data);
            $this->load->view('default/footer');
        } else {
            $this->form_validation->set_rules('nama', 'Name', 'required|trim');
            $this->form_validation->set_rules('start', 'Date', 'required|trim');
            $this->form_validation->set_rules('end', 'Date', 'required|trim');
            if ($this->form_validation->run() == false) {
                $this->load->view('default/header', $data);
                $this->load->view('default/nav');
                $this->load->view('users/edu_inp', $data);
                $this->load->view('default/footer');
            } else {
                $data = [
                    'id_user' => $this->session->userdata('id'),
                    'name' => $this->input->post('nama'),
                    'level' => $this->input->post('level'),
                    'start_date' => $this->input->post('start'),
                    'end_date' => $this->input->post('end')
                ];

                $this->Mduser->insert($data, 'educations');
                $this->session->set_flashdata('messege', '<script>alert("New Entry Success!");</script>');
                redirect('users/edu');
            }
        }
    }

    public function edu_update()
    {
        $data = [
            'name' => $this->input->post('nama'),
            'level' => $this->input->post('level'),
            'start_date' => $this->input->post('start'),
            'end_date' => $this->input->post('end')
        ];
        $this->Mduser->update(['id_edu' => $this->input->post('id')], $data, 'educations');
        $this->session->set_flashdata('messege', '<script>alert("New Entry Success!");</script>');
        redirect('users/edu');
    }

    public function empl()
    {
        $data['title'] = "Employments";
        $name = $this->session->userdata('id');
        $user = $this->db->get_where('employments', ['id_user' => $name])->row_array();

        if ($user) {
            $data['empl'] = $this->Mduser->edit(['id_user' => $name], 'employments');
            $this->load->view('default/header', $data);
            $this->load->view('default/nav');
            $this->load->view('users/empl', $data);
            $this->load->view('default/footer');
        } else {
            $this->form_validation->set_rules('nama', 'Name', 'required|trim');
            $this->form_validation->set_rules('start', 'Date', 'required|trim');
            $this->form_validation->set_rules('end', 'Date', 'required|trim');
            if ($this->form_validation->run() == false) {
                $data['user'] = $this->Mduser->edit(['id' => $this->session->userdata('id')], 'users');

                $this->load->view('default/header', $data);
                $this->load->view('default/nav');
                $this->load->view('users/empl_inp', $data);
                $this->load->view('default/footer');
            } else {
                $data = [
                    'id_user' => $this->session->userdata('id'),
                    'employment_name' => $this->input->post('nama'),
                    'level' => $this->input->post('level'),
                    'company' => $this->input->post('company'),
                    'start_date' => $this->input->post('start'),
                    'end_date' => $this->input->post('end')
                ];

                $this->Mduser->insert($data, 'employments');
                $this->session->set_flashdata('messege', '<script>alert("New Entry Success!");</script>');
                redirect('users/empl');
            }
        }
    }

    public function empl_update()
    {
        $data = [
            'employment_name' => $this->input->post('nama'),
            'level' => $this->input->post('level'),
            'company' => $this->input->post('company'),
            'start_date' => $this->input->post('start'),
            'end_date' => $this->input->post('end')
        ];
        $this->Mduser->update(['id_emp' => $this->input->post('id')], $data, 'employments');
        $this->session->set_flashdata('messege', '<script>alert("Update Entry Success!");</script>');
        redirect('users/empl');
    }

    public function cv()
    {
        $data['title'] = "CV";
        $id = $this->session->userdata('id');
        $data['user'] = $this->Mduser->edit(['id' => $this->session->userdata('id')], 'users');
        $data['edu'] = $this->Mduser->edit(['id_user' => $this->session->userdata('id')], 'educations');
        $data['emp'] = $this->Mduser->edit(['id_user' => $this->session->userdata('id')], 'employments');

        $this->load->view('default/header', $data);
        $this->load->view('default/nav');
        $this->load->view('users/cv', $data);
        $this->load->view('default/footer');
    }
}
