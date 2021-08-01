<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel', 'dashboard');
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['anggota'] = $this->dashboard->countAllAnggota();
        $data['buku'] = $this->dashboard->countAllBuku();
        $data['peminjaman'] = $this->dashboard->countPeminjamanActive();
        $data['donasi'] = $this->dashboard->sumAllDonasi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
