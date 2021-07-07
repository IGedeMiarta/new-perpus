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
            $data['judul'] = 'Peminajaman';
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
            $detail = 1;
            $data = [
                'tgl_pinjam' => $tgl_pinjam,
                'id_anggota' => $anggota,
                'id_buku' => $buku,
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
    public function updatePeminjaman()
    {
        var_dump($_POST);

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
            'id_buku' => $buku,
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
}
