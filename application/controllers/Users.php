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
            $data['petugas'] = $this->user->read('petugas');
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
            $data['anggota'] = $this->user->gelAllAnggota();
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
                'status' => 1
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
}
