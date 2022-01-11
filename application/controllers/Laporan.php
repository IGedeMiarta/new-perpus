<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DashboardModel', 'dashboard');
        $this->load->model('BookModels');
        $this->load->model('UserModel', 'user');
        $this->load->model('TransaksiModel', 'transaksi');


    }
    public function buku()
    {
        $data['judul'] = 'Laporan Data Buku';
        $data['book'] = $this->BookModels->getAllBook();
        $data['rak'] = $this->BookModels->getAllRak();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('laporan/lap_buku', $data);
        $this->load->view('templates/footer');
    }
    public function cetakBuku(){
        $data['book'] = $this->BookModels->getAllBook();
        $data['title']='LAPORAN BUKU';
        $this->load->view('laporancetak/header',$data);
        $this->load->view('laporancetak/buku',$data);
        $this->load->view('laporancetak/footer');
    }
    public function anggota(){
        
        $data['judul'] = 'Laporan Anggota';
        $data['anggota'] = $this->user->gelAllAnggota();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('laporan/lap_anggota', $data);
        $this->load->view('templates/footer');
    
    }
    public function cetakAnggota(){
        $data['title']='LAPORAN ANGGOTA';
        $data['anggota'] = $this->user->gelAllAnggota();
        $this->load->view('laporancetak/header',$data);
        $this->load->view('laporancetak/anggota',$data);
        $this->load->view('laporancetak/footer');
    }
    public function peminjaman(){
            $data['judul'] = 'Peminjaman';
            $data['peminjaman'] = $this->transaksi->getAllPeminjaman();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('laporan/lap_peminjaman');
            $this->load->view('templates/footer');
    }
    public function cetakPeminjaman(){
        $data['title']='LAPORAN PEMINJAMAN';
        $data['peminjaman'] = $this->transaksi->getAllPeminjaman();
        $this->load->view('laporancetak/header',$data);
        $this->load->view('laporancetak/peminjaman',$data);
        $this->load->view('laporancetak/footer');
    }
    public function pengembalian(){
        $data['judul'] = 'Pengembalian';
        $data['pengembalian'] = $this->transaksi->getAllPengembalian();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('laporan/lap_pengembalian',$data);
        $this->load->view('templates/footer');
    }
    public function cetakPegembalian(){
        $data['title']='LAPORAN PENGEMBALIAN';
        $data['pengembalian'] = $this->transaksi->getAllPengembalian();
        $this->load->view('laporancetak/header',$data);
        $this->load->view('laporancetak/pengembalian');
        $this->load->view('laporancetak/footer');
    }
    public function donasi(){
        $data['judul'] = 'Donasi';
        $data['donasi'] = $this->user->getAllDonasi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('laporan/lap_donasi');
        $this->load->view('templates/footer');
    }
    public function cetakDonasi(){
        $data['title']='LAPORAN DONASI';
        $data['donasi'] = $this->user->getAllDonasi();
        $this->load->view('laporancetak/header',$data);
        $this->load->view('laporancetak/donasi');
        $this->load->view('laporancetak/footer');
    }
}
