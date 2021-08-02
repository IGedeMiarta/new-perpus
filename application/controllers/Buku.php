<?php
defined('BASEPATH') or exit('No direct script access allowed');

class buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BookModels');
        $this->load->model('MakeCode');
        $this->load->library('form_validation');
    }
    // public function index()
    // {
    //     $data['judul'] = 'Home';
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/navbar');
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('templates/dashboard');
    //     $this->load->view('templates/footer');
    // }

    public function book()
    {
        $this->form_validation->set_rules('id_buku', 'ID Buku', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Data Buku';
            $data['book'] = $this->BookModels->getAllBook();
            $data['rak'] = $this->BookModels->getAllRak();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('book/book', $data);
            $this->load->view('templates/footer');
        } else {
            $kd_buku = $this->input->post('id_buku');
            $buku = $this->BookModels->edit(['kd_buku' => $kd_buku], 'buku');
            $data = [
                'kd_detail' => $this->input->post('kd_detail'),
                'kd_buku' => $kd_buku,
                'tgl_masuk' => date('Y-m-d'),
                'rak' => $this->input->post('rak'),
                'status' => 1
            ];

            $this->BookModels->insert($data, 'detail_buku');
            $this->BookModels->update(['kd_buku' => $kd_buku], ['status' => 1], 'buku');
            $this->session->set_flashdata('messege', $buku['judul']);
            redirect('buku/book');
        }
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
            redirect('buku/book');
        }
    }
    public function AddPenerbit()
    {
        $nama = $this->input->post('nama_penerbit');
        $data = [
            'kd_penerbit' => $this->input->post('kd_penerbit'),
            'nama_penerbit' => $nama
        ];
        $this->BookModels->insert($data, 'penerbit');
        $this->session->set_flashdata('messege', $nama);
        redirect('buku/BookAdd');
    }
    public function AddKategori()
    {
        $nama = $this->input->post('nama_kategori');
        $data = [
            'kd_kategori' => $this->input->post('kd_kategori'),
            'nama_kategori' => $nama
        ];
        $this->BookModels->insert($data, 'kategori');
        $this->session->set_flashdata('messege', $nama);

        redirect('buku/BookAdd');
    }
    public function AddPengarang()
    {
        $nama = $this->input->post('nama_pengarang');
        $data = [
            'kd_pengarang' => $this->input->post('kd_pengarang'),
            'nama_pengarang' => $nama
        ];
        $this->BookModels->insert($data, 'pengarang');
        $this->session->set_flashdata('messege', $nama);

        redirect('buku/BookAdd');
    }
    public function bookDetail($id)
    {
        $this->form_validation->set_rules('id_buku', 'ID Buku', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Detail Buku';
            $data['buku'] = $this->BookModels->getBukuId($id);
            $buku = $this->BookModels->getBukuId($id);
            $kode = $buku['kd_buku'];
            $data['id'] = $buku['id'];
            $data['detail'] = $this->BookModels->getAllDetailBuku($kode);
            $data['rak'] = $this->BookModels->getAllRak();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('book/bookDetail', $data);
            $this->load->view('templates/footer');
        } else {

            $kd_buku = $this->input->post('id_buku');
            $buku = $this->BookModels->edit(['kd_buku' => $kd_buku], 'buku');
            $data = [
                'kd_detail' => $this->input->post('kd_detail'),
                'kd_buku' => $kd_buku,
                'tgl_masuk' => date('Y-m-d'),
                'rak' => $this->input->post('rak'),
                'status' => 1
            ];

            $this->BookModels->insert($data, 'detail_buku');

            //    cek apakah status buku 0 tau 1
            if ($buku['status'] != 1) {
                $this->BookModels->update(['kd_buku' => $kd_buku], ['status' => 1], 'buku');
            }

            $this->session->set_flashdata('messege', $buku['judul']);
            redirect('buku/bookDetail/' . $id);
        }
    }

    public function kategori()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Kategori';
            $data['kategori'] = $this->BookModels->getAllFromTable('kategori');
            $data['kd_kategori'] =  $this->MakeCode->kd_kategori();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('book/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_kategori' => $this->input->post('kode'),
                'nama_kategori' => $this->input->post('nama'),
            ];
            $this->BookModels->insert($data, 'kategori');
            $this->session->set_flashdata('messege', 'Kategori');
            redirect('buku/kategori');
        }
    }




    public function deleteKategori($id)
    {
        $this->BookModels->delete(['id_kategori' => $id], 'kategori');
        $this->session->set_flashdata('delete', 'Kategori');
        redirect('buku/kategori');
    }

    public function pengarang()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Pengarang';
            $data['pengarang'] = $this->BookModels->getAllFromTable('pengarang');
            $data['kd_pengarang'] =  $this->MakeCode->kd_pengarang();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('book/pengarang', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_pengarang' => $this->input->post('kode'),
                'nama_pengarang' => $this->input->post('nama'),
            ];
            $this->BookModels->insert($data, 'pengarang');
            $this->session->set_flashdata('messege', 'Pengarang');
            redirect('buku/pengarang');
        }
    }

    public function deletePengarang($id)
    {
        $this->BookModels->delete(['id_pengarang' => $id], 'pengarang');
        $this->session->set_flashdata('delete', 'Pengarang');
        redirect('buku/pengarang');
    }


    public function penerbit()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Penerbit';
            $data['penerbit'] = $this->BookModels->getAllFromTable('penerbit');
            $data['kd_penerbit'] =  $this->MakeCode->kd_penerbit();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('book/penerbit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_penerbit' => $this->input->post('kode'),
                'nama_penerbit' => $this->input->post('nama')
            ];
            $this->BookModels->insert($data, 'penerbit');
            $this->session->set_flashdata('messege', 'Penerbit');
            redirect('buku/penerbit');
        }
    }



    public function rak()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Rak Buku';
            $data['rak'] = $this->BookModels->getAllRak();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('book/rak', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_rak' => $this->input->post('kode'),
                'detail' => $this->input->post('nama')
            ];
            $this->BookModels->insert($data, 'rak');
            $this->session->set_flashdata('messege', 'Rak Buku');
            redirect('buku/rak');
        }
    }
    public function deleteRak($id)
    {
        $this->BookModels->delete(['id_rak' => $id], 'rak');
        $this->session->set_flashdata('delete', 'Rak Buku');
        redirect('buku/rak');
    }
}
