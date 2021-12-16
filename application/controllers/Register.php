<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
     public function index(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.username]');

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password doesnt match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['title'] = "Regist Form";
            $this->load->view('auth/header',$data);
            $this->load->view('auth/register');
            $this->load->view('auth/footer');
            
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'user_id' => 'admin'
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('messege', '<script>alert("Selamat, Akun Sudah Dibuat!");</script>');
            redirect('/');
        }
    }
}