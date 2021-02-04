<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data = [
            'judul' => "Aplikasi Review Dosen"
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/index');
        $this->load->view('template_user/footer');
    }

    public function home()
    {
        $daftarDosen = $this->db->get('daftar_dosen')->result_array();
        $data = [
            'judul'         => "Aplikasi Review Dosen | Home",
            'daftar_dosen'  => $daftarDosen
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/home');
        $this->load->view('template_user/footer');
    }

    public function daftarDosen()
    {
        $data = [
            'judul' => "Aplikasi Review Dosen | Daftar Dosen"
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/daftar_dosen');
        $this->load->view('template_user/footer');
    }
}
