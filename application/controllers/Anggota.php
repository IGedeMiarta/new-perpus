<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel', 'dashboard');
        $this->load->library('form_validation');
        $this->load->model('UserModel', 'user');
    }
    public function index()
    {
        // var_dump($this->session->userdata());die;
        $data['judul'] = 'Dashboard Anggota';
        $data['anggota'] = $this->dashboard->countAllAnggota();
        $data['buku'] = $this->dashboard->countAllBuku();
        $data['peminjaman'] = $this->dashboard->countPeminjamanActive();
        $data['donasi'] = $this->dashboard->sumAllDonasi();
        $data['text'] = 'Halaman Anggota perpustakaan, Anggota Perpus dapat melihat data buku perpustakaan.</b>.';
        $data['sebagai']= 'Anggota Perpustakaan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/dashboard', $data);
        $this->load->view('templates/footer');
    }
    public function buku(){

    }


    
    public function all(){
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Anggota';
            $data['anggota'] = $this->user->gelAllAnggota();
            $data['status'] = $this->user->read('status_anggota');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('users/anggota', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'jenis_kel' => $this->input->post('jenkel'),
                'no_hp' => $this->input->post('hp'),
                'alamat' => $this->input->post('alamat'),
                'status' => $this->input->post('status')
            ];
            $this->user->insert($data, 'anggota');
            $this->session->set_flashdata('messege', $this->input->post('nama'));
            redirect('anggota/all');
        }
    }
    public function account($id){
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.username]');

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password doesnt match!',
            'min_length' => 'Password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Add User Petugas';
            $data['status'] = $this->user->read('status_anggota');
            $data['id'] = $id;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('users/user_petugas', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'user_id' => $id,
                'role'=>'petugas'
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('messege', "Users Perugas sukses dibuat");
            redirect('users/petugas');
        }
    }
}