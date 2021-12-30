<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel', 'dashboard');
    }
    public function index()
    {
        // var_dump($this->session->userdata());die;
        $data['judul'] = 'Dashboard Petugas';
        $data['anggota'] = $this->dashboard->countAllAnggota();
        $data['buku'] = $this->dashboard->countAllBuku();
        $data['peminjaman'] = $this->dashboard->countPeminjamanActive();
        $data['donasi'] = $this->dashboard->sumAllDonasi();
        $data['text'] = 'Halaman Petugas perpustakaan, Petugas Perpus dapat menambah data buku perpustakaan dengan menginputkan data buku, dan mengontrol seluruh aktifitas peminjaman dan pengembalian buku</b>.';
        $data['sebagai']= 'Petugas Perpustakaan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/dashboard', $data);
        $this->load->view('templates/footer');
    }
}