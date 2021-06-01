<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BookModels');
        $this->load->model('MakeCode');
        $this->load->library('form_validation');
    }
    public function addKategori()
    {
        $data = $this->input->post();
        $rs = $this->BookModels->addKategori($data);
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
        $buku = $this->BookModels->edit(['id' => $id], 'buku');
        $detail = $this->MakeCode->kd_detail($id);

        $data = [
            'id' => $buku['kd_buku'],
            'kd' => $detail
        ];
        echo json_encode($data);
    }



    public function edit_user()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $user = $this->db->get_where('users', ['id' => $id])->row();
            echo json_encode($user);
        } else {
            redirect('eror');
        }
    }
    public function edit_edu()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $user = $this->db->get_where('educations', ['id_user' => $id])->row();
            echo json_encode($user);
        } else {
            redirect('eror');
        }
    }
    public function edit_empl()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $user = $this->db->get_where('employments', ['id_user' => $id])->row();
            echo json_encode($user);
        } else {
            redirect('eror');
        }
    }
}
