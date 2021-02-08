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
        $daftarDosen = $this->Model_dosen->dosenHome();
        $data = [
            'judul'         => "Aplikasi Review Dosen | Home",
            'daftar_dosen'  => $daftarDosen
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/home');
        $this->load->view('template_user/footer');
    }

    // Login User
    public function loginUser()
    {
        $data = [
            'judul' => "Aplikasi Review Dosen | Login"
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/login_user');
        $this->load->view('template_user/footer');
    }

    public function registrasiUser()
    {
        $data = [
            'judul' => "Aplikasi Review Dosen | Registrasi"
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/registrasi_user');
        $this->load->view('template_user/footer');
    }

    public function daftarDosen()
    {
        $daftarDosen = $this->db->get('daftar_dosen')->result_array();
        $data = [
            'judul' => "Aplikasi Review Dosen | Daftar Dosen",
            'daftar_dosen'  => $daftarDosen
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/daftar_dosen');
        $this->load->view('template_user/footer');
    }

    public function riviewDosen($id_daftar_dosen)
    {
        $riviewDosen = $this->db->get_where('daftar_dosen', ['id_daftar_dosen' => $id_daftar_dosen])->row_array();

        $data = [
            'judul' => "Aplikasi Review Dosen | Riview Dosen",
            'riviewDosen' => $riviewDosen
        ];

        $this->load->view('user/riview_dosen', $data);
    }


    public function hasilRiviewDosen()
    {
        $rating1 = $_POST['rating1'];
        $rating2 = $_POST['rating2'];
        $saran = $_POST['saran'];
        $id_dosen = $_POST['id_dosen'];

        $data = [
            'rating1' => $rating1,
            'rating2' => $rating2,
            'saran' => $saran,
            'id_daftar_dosen' => $id_dosen
        ];

        $this->db->insert('hasil_penilaian', $data);
    }

    public function berhasil()
    {
        $data = [
            'judul' => "Aplikasi Review Dosen | Berhasil"
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/berhasil');
        $this->load->view('template_user/footer');
    }
}
