<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HasilPenilaian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Auth');
        }
    }


    public function index()
    {
        $daftarDosen = $this->db->get('daftar_dosen')->result_array();

        $data = [
            'getUser'      => $this->Model_user->getUser(),
            'daftar_dosen' => $daftarDosen
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/review/index');
        $this->load->view('templates/footer');
    }

    public function detail($id_dosen)
    {
        $dosenDetail = $this->db->get_where('daftar_dosen', ['id_daftar_dosen' => $id_dosen])->row_array();
        $hasilNilai = $this->Model_dosen->hasilNilai($id_dosen);

        var_dump($hasilNilai);
        die;

        $data = [
            'getUser'      => $this->Model_user->getUser(),
            'dosen_detail' => $dosenDetail,
            'hasil_nilai'  => $hasilNilai
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/review/detail');
        $this->load->view('templates/footer');
    }
}
