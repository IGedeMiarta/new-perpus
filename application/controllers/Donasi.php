<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BookModels');
        $this->load->model('MakeCode');
        $this->load->library('form_validation');
        $this->load->model('UserModel', 'user');
    }
    public function index()
    {
        $data['judul'] = 'Donasi';
        $data['donasi'] = $this->user->read('donasi');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('donate/donasi');
        $this->load->view('templates/footer');
    }
    public function donatur()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Donatur';
            $data['donatur'] = $this->user->read('donatur');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('donate/donatur', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_donatur' => $this->input->post('nama'),
                'jenkel' => $this->input->post('jenkel'),
                'no_hp' => $this->input->post('hp'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->user->insert($data, 'donatur');
            $this->session->set_flashdata('messege', $this->input->post('nama'));
            redirect('donasi/donatur');
        }
    }
    public function updateDonatur()
    {
        $id = $_POST['id'];
        $data = [
            'nama_donatur' => $_POST['nama'],
            'jenkel' => $_POST['jenkel'],
            'no_hp' => $_POST['hp'],
            'alamat' => $_POST['alamat']
        ];
        $this->user->update(['id_donatur' => $id], $data, 'donatur');
        $this->session->set_flashdata('update', $this->input->post('nama'));
        redirect('donasi/donatur');
    }
    public function deleteDonatur($id)
    {
        $this->user->delete(['id_donatur' => $id], 'donatur');
        $this->session->set_flashdata('delete', 'donatur');
        redirect('donasi/donatur');
    }
}
