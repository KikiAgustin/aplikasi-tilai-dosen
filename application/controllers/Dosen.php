<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('akses_dosen')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Silahkan login dulu untuk masuk ke halaman admin</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('AuthDosen');
        }
    }

    public function index()
    {

        $getUser = $this->Model_dosen->getUser();

        $email = $getUser['email'];

        $dosen =  $this->db->get_where('daftar_dosen', ['email' => $email])->row_array();


        $data = [
            'judul'   => "Halama Dosen | Home",
            'getUser' => $getUser,
            'dosen'   => $dosen
        ];

        $this->load->view('template_dosen/header', $data);
        $this->load->view('template_dosen/sidebar');
        $this->load->view('template_dosen/topbar');
        $this->load->view('dosen/index');
        $this->load->view('template_dosen/footer');
    }
}
