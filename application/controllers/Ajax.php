<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ajax');
        $this->load->model('MakeCode');
        $this->load->library('form_validation');
        $this->load->model('UserModel', 'user');
    }
    public function addKategori()
    {
        $data = $this->input->post();
        $rs = $this->ajax->addKategori($data);
        if ($rs >= 0) {
            return [
                'message' => 'Successfully insert data'
            ];
        } else {
            return [
                'message' => 'Unsuccessfully insert data'
            ];
        }
    }

    public function bookDetail()
    {
        $id = $this->input->post('id');
        $buku = $this->ajax->edit(['id' => $id], 'buku');
        $detail = $this->MakeCode->kd_detail($id);

        $data = [
            'id' => $buku['kd_buku'],
            'kd' => $detail
        ];
        echo json_encode($data);
    }
    public function editPetugas()
    {
        $id = $this->input->post('id');
        $petugas = $this->ajax->edit(['id_petugas' => $id], 'petugas');
        echo json_encode($petugas);
    }
    public function updatePetugas()
    {
        $data = $_POST;
        $this->user->updatePetugas($data);
    }
    public function editAnggota()
    {
        $id = $this->input->post('id');
        $anggota = $this->ajax->edit(['id_anggota' => $id], 'anggota');
        echo json_encode($anggota);
    }
    public function editDonatur()
    {
        $id = $_POST['id'];
        $donatur = $this->ajax->edit(['id_donatur' => $id], 'donatur');
        echo json_encode($donatur);
    }
}
