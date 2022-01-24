<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('UserModel', 'user');
    }
    public function petugas()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Petugas';
            $data['petugas'] = $this->user->account();
           
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('users/petugas', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'jenkel' => $this->input->post('jenkel'),
                'no_hp' => $this->input->post('hp'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->user->insert($data, 'petugas');
            $this->session->set_flashdata('messege', $this->input->post('nama'));
            redirect('users/petugas');
        }
    }
    public function updatePetugas()
    {
        $id = $_POST['id'];
        $data = [
            'nip' => $_POST['nip'],
            'nama' => $_POST['nama'],
            'jenkel' => $_POST['jenkel'],
            'no_hp' => $_POST['hp'],
            'alamat' => $_POST['alamat']
        ];

        $this->user->update(['id_petugas' => $id], $data, 'petugas');
        $this->session->set_flashdata('update', $this->input->post('nama'));
        redirect('users/petugas');
    }
    public function deletePetugas($id)
    {
        $this->user->delete(['id_petugas' => $id], 'petugas');
        $this->session->set_flashdata('delete', 'Petugas');
        redirect('users/petugas');
    }

    public function anggota()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Anggota';
            $data['anggota'] = $this->user->accountAnggota();
     
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
            redirect('users/anggota');
        }
    }
    public function updateAnggota()
    {
        $id = $_POST['id'];
        $data = [
            'nis' => $_POST['nis'],
            'nama' => $_POST['nama'],
            'jenis_kel' => $_POST['jenkel'],
            'no_hp' => $_POST['hp'],
            'alamat' => $_POST['alamat'],
            'status' => $_POST['status']
        ];

        $this->user->update(['id_anggota' => $id], $data, 'anggota');
        $this->session->set_flashdata('update', $this->input->post('nama'));
        redirect('users/anggota');
    }
    public function deleteAnggota($id)
    {
        $this->user->delete(['id_anggota' => $id], 'anggota');
        $this->session->set_flashdata('delete', 'Anggota');
        redirect('users/anggota');
    }
    public function kartuAnggota()
    {
        $data['judul'] = 'Petugas';
        $data['anggota'] = $this->user->gelAllAnggota();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('users/kartuanggota', $data);
        $this->load->view('templates/footer');
    }
    public function cardPrint($id)
    {
        $data['anggota'] = $this->user->edit(['id_anggota' => $id], 'anggota');
        $this->load->view('users/cardprint', $data);
    }
    public function status_anggota()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Status Anggota';
            $data['status'] = $this->user->read('status_anggota');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('users/status_anggota', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'status' => $this->input->post('nama')
            ];
            $this->user->insert($data, 'status_anggota');
            $this->session->set_flashdata('messege', $this->input->post('nama'));
            redirect('users/status_anggota');
        }
    }
    public function status_delete($id)
    {
        $this->user->delete(['id_status_anggota' => $id], 'status_anggota');
        $this->session->set_flashdata('delete', 'Status Anggota');
        redirect('users/status_anggota');
    }

    public function tambah($id){ //tambah user petugas
        
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
                'anggota_id' => $id,
                'role'=>'anggota'
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('messege', "Users Petugas sukses dibuat");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function kepala()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Kepala Perpus';
            $data['petugas'] = $this->user->account();
           
            // var_dump($data);die;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('users/kepala', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'jenkel' => $this->input->post('jenkel'),
                'no_hp' => $this->input->post('hp'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->user->insert($data, 'petugas');
            $this->session->set_flashdata('messege', $this->input->post('nama'));
            redirect('users/petugas');
        }
    }
    public function updateKepala()
    {
        $id = $_POST['id'];
        $data = [
            'nis' => $_POST['nis'],
            'nama' => $_POST['nama'],
            'jenis_kel' => $_POST['jenkel'],
            'no_hp' => $_POST['hp'],
            'alamat' => $_POST['alamat'],
            'status' => $_POST['status']
        ];

        $this->user->update(['id_anggota' => $id], $data, 'anggota');
        $this->session->set_flashdata('update', $this->input->post('nama'));
        redirect('users/kepala');
    }
    public function deleteKepala($id)
    {
        $this->user->delete(['id_anggota' => $id], 'anggota');
        $this->session->set_flashdata('delete', 'Anggota');
        redirect('users/kepala');
    }
      public function createAccount($id){ //tambah user petugas
        
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
            $this->load->view('users/add_anggota', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'user_id' => $id,
                'role'=>'petugas'
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('messege', "Users Anggota sukses dibuat");
            redirect('users/petugas');
        }
    }
}
