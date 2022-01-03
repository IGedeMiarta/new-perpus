<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BookModels');
        $this->load->model('MakeCode');
        $this->load->library('form_validation');
        $this->load->model('TransaksiModel', 'transaksi');
    }
    public function peminjaman()
    {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Peminjaman';
            $data['peminjaman'] = $this->transaksi->getAllPeminjaman();
            $data['buku'] = $this->transaksi->gelAllAvailableBook();
            $data['bukuedt'] = $this->transaksi->gelAllBook();
            $data['anggota'] = $this->transaksi->read('anggota');
            $data['detail'] = $this->transaksi->read('detail_peminjaman');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('transaksi/peminjaman');
            $this->load->view('templates/footer');
        } else {
            // insert data peminjaman
            
            $tgl_pinjam = $this->input->post('tanggal');
            $anggota = $this->input->post('anggota');
            $buku = $this->input->post('buku');
            $batas_pinjam = date("Y-m-d", strtotime("$tgl_pinjam + 7 days"));
            $detail = 1; #status dipinjam

            $cek_peminjaman = $this->transaksi->countPeminjaman($anggota);
            if($cek_peminjaman['total_pinjam'] >= 3 ){
                $this->session->set_flashdata('gagal', 'Peminjaman');
                redirect('transaksi/peminjaman');
            }else{
                
                $data = [
                    'tgl_pinjam' => $tgl_pinjam,
                    'id_anggota' => $anggota,
                    'isbn' => $buku,
                    'batas_pinjam' => $batas_pinjam,
                    'detail' => $detail
                ];
                $this->transaksi->insert($data, 'peminjaman');
                //update detail buku status=0
                $this->transaksi->update(['id_detail' => $buku], ['status' => 0], 'detail_buku');
                //cari nama peminjam
                $anggota = $this->transaksi->get(['id_anggota' => $anggota], 'anggota');
                $this->session->set_flashdata('messege', 'Peminjaman ' . $anggota['nama']);
                redirect('transaksi/peminjaman');
            }
            
        }
    }
    public function updatePeminjaman()
    {

        $id = $this->input->post('id');
        $tgl_pinjam = $this->input->post('tanggal');
        $anggota = $this->input->post('anggota');
        $buku = $this->input->post('buku');
        $bk2 = $this->input->post('bk');
        $batas_pinjam = date("Y-m-d", strtotime("$tgl_pinjam + 7 days"));
        $detail = $this->input->post('status');
        $data = [
            'tgl_pinjam' => $tgl_pinjam,
            'id_anggota' => $anggota,
            'isbn' => $buku,
            'batas_pinjam' => $batas_pinjam,
            'detail' => $detail
        ];
        $this->transaksi->update(['id_peminjaman' => $id], $data, 'peminjaman');
        $anggota = $this->transaksi->get(['id_anggota' => $anggota], 'anggota');

        if ($bk2 != $buku) {
            //    kembalikan nilai status detail buku ke 1
            $this->transaksi->update(['id_detail' => $bk2], ['status' => 1], 'detail_buku');
            // ubah status buku baru ke 0
            $this->transaksi->update(['id_detail' => $buku], ['status' => 0], 'detail_buku');
        }
        $this->session->set_flashdata('update', 'Peminjaman ' . $anggota['nama']);
        redirect('transaksi/peminjaman');
    }
    public function pengembalian()
    {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Pengembalian';
            $data['peminjaman'] = $this->transaksi->getPeminjamanActive();
            $data['pengembalian'] = $this->transaksi->getAllPengembalian();
            $data['buku'] = $this->transaksi->gelAllAvailableBook();
            $data['bukuedt'] = $this->transaksi->gelAllBook();
            $data['anggota'] = $this->transaksi->read('anggota');
            $data['detail'] = $this->transaksi->read('detail_peminjaman');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('transaksi/pengembalian');
            $this->load->view('templates/footer');
        } else {
            // insert data peminjaman
            $tgl_kembali = $this->input->post('tanggal');
            $peminjaman = $this->input->post('peminjaman');
            $status = $this->input->post('status');
            $data = [
                'tgl_kembali' => $tgl_kembali,
                'id_pinjam' => $peminjaman,
                'detail' => $status
            ];

            //insert data ke table pengembalian
            $this->transaksi->insert($data, 'pengembalian');
           
            // update status peminjaman 
            $this->transaksi->update(['id_peminjaman' => $peminjaman], ['detail' => $status], 'peminjaman');


            $peminjaman_db =  $this->transaksi->get(['id_peminjaman' => $peminjaman], 'peminjaman');

            $detail_buku = $peminjaman_db['isbn'];
            if ($status != 3) {
                echo 'status true';
                $this->transaksi->update(['id_detail' => $detail_buku], ['status' => 1], 'detail_buku');
            }

            $this->session->set_flashdata('messege', 'Pengembalian ');
            redirect('transaksi/pengembalian');
        }
    }
    public function perpanjangan()
    {
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Perpanjangan';
            $data['perpanjangan'] = $this->transaksi->getAllPerpanjangan();
            $data['peminjaman'] = $this->transaksi->getPeminjamanTerpinjam();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('transaksi/perpanjangan');
            $this->load->view('templates/footer');
        } else {
            // insert data peminjaman
            $tgl_perpanjang = $this->input->post('tanggal');
            $peminjaman = $this->input->post('peminjaman');
            $batas_pinjam = date("Y-m-d", strtotime("$tgl_perpanjang + 7 days"));
            $status = 4;
            $data_pemijam = [
                'batas_pinjam' => $batas_pinjam,
                'tgl_perpanjang' => $tgl_perpanjang,
                'detail' => $status
            ];

            $data_perpanjang = [
                'tgl_perpanjangan' => $tgl_perpanjang,
                'id_peminjaman' => $peminjaman,
                'batas_kembali' => $batas_pinjam,
                'detail' => $status

                
            ];

             //insert data di table peminjaman_selesai
             $this->transaksi->insert($data_perpanjang, 'perpanjangan');
            // update status peminjaman 
            $this->transaksi->update(['id_peminjaman' => $peminjaman], $data_pemijam, 'peminjaman');

            $this->session->set_flashdata('messege', 'Perpanjangan');
            redirect('transaksi/perpanjangan');
        }
    }
}
