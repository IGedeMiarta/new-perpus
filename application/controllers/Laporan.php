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
        // var_dump($_GET);
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
          
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['peminjaman'] = $this->transaksi->getAllPeminjamanOnTanggal($mulai,$sampai);
         
        } else if(isset($_GET['anggota'])){
            // mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
            $data['peminjaman'] = $this->transaksi->getAllPeminjamanOnAnggota($_GET['anggota']);
            
        }else if(isset($_GET['buku'])){
            $data['peminjaman'] = $this->transaksi->getAllPeminjamanOnBuku($_GET['buku']);

        }else if(isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai']) && isset($_GET['anggota'])){
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            $anggota = $this->input->get('anggota');
            $data['peminjaman'] = $this->transaksi->getAllPeminjamanOnTanggalAnggota($mulai,$sampai,$anggota);
        }
        else{
            $data['peminjaman'] = $this->transaksi->getAllPeminjaman();
        }
            $data['anggota'] = $this->user->gelAllAnggota();
            $data['book'] = $this->BookModels->getAllBook();
            $data['judul'] = 'Peminjaman';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('laporan/lap_peminjaman',$data);
            $this->load->view('templates/footer');
           
    }
    public function cetakPeminjaman(){
       if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
          
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['peminjaman'] = $this->transaksi->getAllPeminjamanOnTanggal($mulai,$sampai);
         
        } else if(isset($_GET['anggota'])){
            // mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
            $data['peminjaman'] = $this->transaksi->getAllPeminjamanOnAnggota($_GET['anggota']);
            
        }else if(isset($_GET['buku'])){
            $data['peminjaman'] = $this->transaksi->getAllPeminjamanOnBuku($_GET['buku']);

        }
        else{
            $data['peminjaman'] = $this->transaksi->getAllPeminjaman();
        }
        $data['title']='LAPORAN PEMINJAMAN';
        $this->load->view('laporancetak/header',$data);
        $this->load->view('laporancetak/peminjaman',$data);
        $this->load->view('laporancetak/footer');
    }
    public function pengembalian(){
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
          
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['pengembalian'] = $this->transaksi->getAllPengembalianOnTanggal($mulai,$sampai);
         
        } else {
            // mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
            $data['pengembalian'] = $this->transaksi->getAllPengembalian();


        }
        $data['judul'] = 'Pengembalian';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('laporan/lap_pengembalian',$data);
        $this->load->view('templates/footer');
    }

    public function cetakPegembalian(){
         if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
            $data['pengembalian'] = $this->transaksi->getAllPengembalianOnTanggal($mulai,$sampai);

        }
        $data['title']='LAPORAN PENGEMBALIAN';
        $this->load->view('laporancetak/header',$data);
        $this->load->view('laporancetak/pengembalian');
        $this->load->view('laporancetak/footer');
    }
    public function donasi(){
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
          
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai

            $data['donasi'] = $this->user->getAllDonasiOnTanggal($mulai,$sampai);
         
        } else {
            // mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
            $data['donasi'] = $this->user->getAllDonasi();


        }
        $data['judul'] = 'Donasi';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('laporan/lap_donasi');
        $this->load->view('templates/footer');
    }
    public function cetakDonasi(){
          if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal sampai
            $data['donasi'] = $this->user->getAllDonasiOnTanggal($mulai,$sampai);

        }
        $data['title']='LAPORAN DONASI';
        $this->load->view('laporancetak/header',$data);
        $this->load->view('laporancetak/donasi');
        $this->load->view('laporancetak/footer');
    }
}
