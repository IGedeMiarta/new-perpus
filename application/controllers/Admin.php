<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BookModels');
        $this->load->model('MakeCode');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Home';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/starter');
        $this->load->view('templates/footer');
    }

    public function book()
    {
        $data['judul'] = 'Data Buku';
        $data['book'] = $this->BookModels->getAllBook();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('book/book', $data);
        $this->load->view('templates/footer');
    }
    public function BookAdd()
    {
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
        $this->form_validation->set_rules('pengarang', 'pengarang', 'trim|required');
        $this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required');
        $this->form_validation->set_rules('kategori', 'kategori', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['kd_buku'] = $this->MakeCode->kd_buku();
            $data['kd_pengarang'] =  $this->MakeCode->kd_pengarang();
            $data['kd_penerbit'] =  $this->MakeCode->kd_penerbit();
            $data['kd_kategori'] =  $this->MakeCode->kd_kategori();
            $data['kategori'] = $this->BookModels->getAllFromTable('kategori');
            $data['pengarang'] = $this->BookModels->getAllFromTable('pengarang');
            $data['penerbit'] = $this->BookModels->getAllFromTable('penerbit');
            $data['judul'] = 'Add Buku';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('book/bookadd', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_buku' => $this->input->post('kd_buku'),
                'judul' => $this->input->post('judul'),
                'pengarang' => $this->input->post('pengarang'),
                'penerbit' => $this->input->post('penerbit'),
                'th_terbit' => $this->input->post('tahun'),
                'kategori' => $this->input->post('kategori'),
            ];
            $this->BookModels->insert($data, 'buku');
            $this->session->set_flashdata('messege', 'Buku');
            redirect('admin/book');
        }
    }
    public function kategori()
    {
        $data['judul'] = 'Kategori';
        $data['kategori'] = $this->BookModels->getAllFromTable('kategori');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('book/kategori', $data);
        $this->load->view('templates/footer');
    }
    public function AddKategori()
    {
        $data = [
            'kd_kategori' => $this->input->post('kd_kategori'),
            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        $this->BookModels->insert($data, 'kategori');
        $this->session->set_flashdata('messege', 'Kategori');

        redirect('admin/BookAdd');
    }
    public function pengarang()
    {
        $data['judul'] = 'Pengarang';
        $data['pengarang'] = $this->BookModels->getAllFromTable('pengarang');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('book/pengarang', $data);
        $this->load->view('templates/footer');
    }
    public function AddPengarang()
    {
        $data = [
            'kd_pengarang' => $this->input->post('kd_pengarang'),
            'nama_pengarang' => $this->input->post('nama_pengarang')
        ];
        $this->BookModels->insert($data, 'pengarang');
        $this->session->set_flashdata('messege', 'Pengarang');

        redirect('admin/BookAdd');
    }
    public function penerbit()
    {
        $data['judul'] = 'Penerbit';
        $data['penerbit'] = $this->BookModels->getAllFromTable('penerbit');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('book/penerbit', $data);
        $this->load->view('templates/footer');
    }
    public function AddPenerbit()
    {
        $data = [
            'kd_penerbit' => $this->input->post('kd_penerbit'),
            'nama_penerbit' => $this->input->post('nama_penerbit')
        ];
        $this->BookModels->insert($data, 'penerbit');
        $this->session->set_flashdata('messege', 'Penerbit');

        redirect('admin/BookAdd');
    }
    public function rak()
    {
        $data['judul'] = 'Rak';
        $data['rak'] = $this->BookModels->getAllFromTable('rak');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('book/rak', $data);
        $this->load->view('templates/footer');
    }
}
