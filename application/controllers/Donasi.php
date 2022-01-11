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
        $this->form_validation->set_rules('donatur', 'donatur', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Donasi';
            $data['donasi'] = $this->user->getAllDonasi();
            $data['donatur'] = $this->user->read('donatur');
            $data['kd_buku'] = $this->MakeCode->kd_buku();
            $data['kd_pengarang'] =  $this->MakeCode->kd_pengarang();
            $data['kd_penerbit'] =  $this->MakeCode->kd_penerbit();
            $data['kd_kategori'] =  $this->MakeCode->kd_kategori();
            $data['kategori'] = $this->BookModels->getAllFromTable('kategori');
            $data['pengarang'] = $this->BookModels->getAllFromTable('pengarang');
            $data['penerbit'] = $this->BookModels->getAllFromTable('penerbit');
            $data['rak'] = $this->BookModels->getAllRak();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('donate/donasi');
            $this->load->view('templates/footer');
        } else {
            // insert ke detail donasi
            $tanggal = date('Y-d-m');
            $donatur = $this->input->post('donatur');
            $jenis = $this->input->post('jenis');
            if($jenis == 'uang'){
                $jml_donasi = $this->input->post('jml');
                $keterangan = $this->input->post('ket');
                $status = $this->input->post('status');
                $data_dtl = [
                    'keterangan' => $keterangan,
                    'status' => $status
                ];
                $this->user->insert($data_dtl, 'detail_donasi');
                // cari id detail donasi terkahir input;
                $detail_donasi = $this->db->query("SELECT * FROM detail_donasi WHERE detail_donasi.keterangan = '" . $keterangan . "' AND detail_donasi.status='" . $status . "' ORDER BY id_detail_donasi DESC LIMIT 1")->row_array();
                $id = $detail_donasi['id_detail_donasi'];
                $data_donasi = [
                    'tgl_donasi' => $tanggal,
                    'donatur' => $donatur,
                    'jml_donasi' => $jml_donasi,
                    'detail' => $id
                ];
                $this->user->insert($data_donasi, 'donasi');
            }
            if($jenis == 'buku'){
                $jml_donasi = null;
                $buku =  $this->input->post('kd_buku');
                $keterangan = $this->input->post('ket');
                $status = $this->input->post('status');
                $data_dtl = [
                    'keterangan' => $keterangan,
                    'status' => $status
                ];
                $this->user->insert($data_dtl, 'detail_donasi');
                // cari id detail donasi terkahir input;
                $detail_donasi = $this->db->query("SELECT * FROM detail_donasi WHERE detail_donasi.keterangan = '" . $keterangan . "' AND detail_donasi.status='" . $status . "' ORDER BY id_detail_donasi DESC LIMIT 1")->row_array();
                $id = $detail_donasi['id_detail_donasi'];
                $data_donasi = [
                    'tgl_donasi' => $tanggal,
                    'donatur' => $donatur,
                    'jml_donasi' => $jml_donasi,
                    'buku'=>$buku,
                    'detail' => $id
                ];
                $this->user->insert($data_donasi, 'donasi');


                $data = [
                    'kd_buku' => $this->input->post('kd_buku'),
                    'judul' => $this->input->post('judul'),
                    'pengarang' => $this->input->post('pengarang'),
                    'penerbit' => $this->input->post('penerbit'),
                    'th_terbit' => $this->input->post('tahun'),
                    'kategori' => $this->input->post('kategori'),
                    'status'=>1
                ];
                $this->BookModels->insert($data, 'buku');
                $data2 = [
                    'kd_detail' => $this->input->post('kd_buku') . 'DTL1',
                    'kd_buku' => $this->input->post('kd_buku'),
                    'tgl_masuk' => date('Y-m-d'),
                    'rak' => $this->input->post('rak'),
                    'status' => 1
                ];

                $this->BookModels->insert($data2, 'detail_buku');
            }
            $this->session->set_flashdata('messege', 'donasi');
            redirect('donasi');
        }
    }
    public function updateDonasi(){
        // var_dump($_POST); die;
        $id_donasi = $_POST['id'];
        $jenis = $_POST['jenis'];
        $detail_donasi = $_POST['detail_donasi'];
        $keterangan = $_POST['ket'];
        $status= $_POST['status'];
        $data_detail = [
                'keterangan'=>$keterangan,
                'status'=>$status
            ];
        if ($jenis == 'uang') {
            $donatur = $_POST['donatur'];
            $jml_donasi = $_POST['jml'];
            $data =[
                'donatur'=>$donatur,
                'jml_donasi'=>$jml_donasi
            ];
           
            $this->user->update(['id_donasi' => $id_donasi], $data, 'donasi');
            $this->user->update(['id_detail_donasi' => $detail_donasi], $data_detail, 'detail_donasi');
            $this->session->set_flashdata('update', 'Donasi');
            redirect('donasi');
        }else{
            $isbn = $_POST['isbn'];
            $judul = $_POST['judul'];
            $pengarang = $_POST['pengarang'];
            $penerbit = $_POST['penerbit'];
            $tahun = $_POST['tahun'];
            $kategori = $_POST['kategori'];
            $data = [
                'judul'=>$judul,
                'pengarang'=>$pengarang,
                'penerbit'=>$penerbit,
                'th_terbit'=>$tahun,
                'kategori'=>$kategori
            ];
            $this->user->update(['isbn' => $isbn], $data, 'buku');

            $id_detail = $_POST['id_detail'];
            $data2 =[
                'rak'=> $_POST['rak']
            ];
            $this->user->update(['id_detail' => $id_detail], $data2, 'detail_buku');
            $this->user->update(['id_detail_donasi' => $detail_donasi], $data_detail, 'detail_donasi');
            $this->session->set_flashdata('update', 'Donasi');
            redirect('donasi');
            
        }
    }
    public function deleteDonasi($id_donasi)
    {
        $this->user->delete(['id_donasi' => $id_donasi], 'donasi');
        $this->session->set_flashdata('update', 'Dihapus');
        redirect('donasi');
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
