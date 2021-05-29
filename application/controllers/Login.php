<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = "Login Form";
            $this->load->view('default/header', $data);
            $this->load->view('login/login');
            $this->load->view('default/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'address' => $user['address'],
                    'phone' => $user['phone']
                ];
                $this->session->set_userdata($data);
                redirect('users');
            } else {
                $this->session->set_flashdata('messege', '<script>alert("Password Salah");</script>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('messege', '<script>alert("Email Belum Terdaftar");</script>');

            redirect('login');
        }
    }

    public function regist()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password doesnt match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');
        $this->form_validation->set_rules('nama', 'Name', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Address', 'required|trim');
        $this->form_validation->set_rules('hp', 'Phone', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Regist Form";
            $this->load->view('default/header', $data);
            $this->load->view('login/regist');
            $this->load->view('default/footer');
        } else {
            $data = [
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'name' => $this->input->post('nama'),
                'address' => $this->input->post('alamat'),
                'phone' => $this->input->post('hp'),
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata('messege', '<script>alert("Selamat, Akun Sudah Dibuat!");</script>');
            redirect('login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('address');
        $this->session->unset_userdata('phone');
        $this->session->set_flashdata('messege', '<script>alert("Anda Sudah Logout!");</script>');
        redirect('login');
    }
}
