<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index(){
        $data['title'] = 'Login';
        $this->load->view('auth/header',$data);
        $this->load->view('auth/login');
        $this->load->view('auth/footer');
    }
    public function login(){
        $as = $this->input->post('user');
        $password = $this->input->post('password');

        $cek = $this->db->get_where('user', ['username' => $as])->row_array();
        if(!isset($cek)){
            $cek = $this->db->get_where('user', ['email' => $as])->row_array();
        }
        $user=$cek;
        if ($user) {
            $this->session->set_userdata($user);
            if (password_verify($password, $user['password'])) {
                $out = [
                    'type'=>'success',
                    'data'=>$user
                ];
            } else {
                $out = ['type'=>'pass'];
            }
        } else {
            $out = ['type'=>'user'];
        }
        echo json_encode($out);
       
    }
    public function logout(){
       $this->session->sess_destroy();
        return redirect('/');
    }
  
}