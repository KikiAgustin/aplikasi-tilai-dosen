<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HasilPenilaian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('akses_admin')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Silahkan login dulu untuk masuk ke halaman admin</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
            redirect('Auth');
        }
    }


    public function index()
    {
        // $idDaftarDosen = $this->Model_dosen->daftarDosenNilai();

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
        $cekDosen = $this->Model_dosen->cekDosen($id_dosen);

        if ($cekDosen < 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Mohon Maaf untuk dosen ini belum ada Review yang masuk!!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('HasilPenilaian/index');
        }

        $dosenDetail = $this->db->get_where('daftar_dosen', ['id_daftar_dosen' => $id_dosen])->row_array();

        // Cara Mengajar
        $mengajar1 = $this->Model_dosen->mengajar1($id_dosen);
        $mengajar2 = $this->Model_dosen->mengajar2($id_dosen);
        $mengajar3 = $this->Model_dosen->mengajar3($id_dosen);
        $mengajar4 = $this->Model_dosen->mengajar4($id_dosen);
        $mengajar5 = $this->Model_dosen->mengajar5($id_dosen);
        $mengajar6 = $this->Model_dosen->mengajar6($id_dosen);
        $mengajar7 = $this->Model_dosen->mengajar7($id_dosen);
        $mengajar8 = $this->Model_dosen->mengajar8($id_dosen);
        $mengajar9 = $this->Model_dosen->mengajar9($id_dosen);
        $mengajar10 = $this->Model_dosen->mengajar10($id_dosen);

        // Penyampaian Materi
        $penyampaian1 = $this->Model_dosen->penyampaian1($id_dosen);
        $penyampaian2 = $this->Model_dosen->penyampaian2($id_dosen);
        $penyampaian3 = $this->Model_dosen->penyampaian3($id_dosen);
        $penyampaian4 = $this->Model_dosen->penyampaian4($id_dosen);
        $penyampaian5 = $this->Model_dosen->penyampaian5($id_dosen);
        $penyampaian6 = $this->Model_dosen->penyampaian6($id_dosen);
        $penyampaian7 = $this->Model_dosen->penyampaian7($id_dosen);
        $penyampaian8 = $this->Model_dosen->penyampaian8($id_dosen);
        $penyampaian9 = $this->Model_dosen->penyampaian9($id_dosen);
        $penyampaian10 = $this->Model_dosen->penyampaian10($id_dosen);

        // Jumlah Reviewer
        $jumlahReview = $this->Model_dosen->jumlahReview($id_dosen);

        $jumlahCaraMengajar = $this->Model_dosen->jumlahCaraMengajar($id_dosen);
        $hasilJumlahCaraMengajar = $jumlahCaraMengajar['rating1'];
        $jumlahPenyampaianMateri = $this->Model_dosen->jumlahPenyampaianMatari($id_dosen);
        $hasilJumlahPenyampaianMateri = $jumlahPenyampaianMateri['rating2'];

        $hasilSatu =  ceil($hasilJumlahCaraMengajar) / ceil($jumlahReview);
        $hasilDua = ceil($hasilJumlahPenyampaianMateri) / $jumlahReview;

        $jumlahSatuDua = ceil($hasilSatu) + ceil($hasilDua);

        $hasilAkhir = ceil($jumlahSatuDua) / 2;

        $hasilFinal = ceil($hasilAkhir);

        if ($hasilFinal >= 8) {
            $hasilFinal = "Sangat Baik";
        } else if ($hasilFinal >= 6) {
            $hasilFinal = "Baik";
        } else if ($hasilFinal >= 4) {
            $hasilFinal = "Cukup";
        } else if ($hasilFinal >= 2) {
            $hasilFinal = "Tidak Cukup";
        } else {
            $hasilFinal = "Sangat Tidak Cukup";
        }


        $data = [
            'getUser'      => $this->Model_user->getUser(),
            'dosen_detail' => $dosenDetail,
            'mengajar1'  => $mengajar1,
            'mengajar2'  => $mengajar2,
            'mengajar3'  => $mengajar3,
            'mengajar4'  => $mengajar4,
            'mengajar5'  => $mengajar5,
            'mengajar6'  => $mengajar6,
            'mengajar7'  => $mengajar7,
            'mengajar8'  => $mengajar8,
            'mengajar9'  => $mengajar9,
            'mengajar10'  => $mengajar10,
            'penyampaian1'  =>  $penyampaian1,
            'penyampaian2'  =>  $penyampaian2,
            'penyampaian3'  =>  $penyampaian3,
            'penyampaian4'  =>  $penyampaian4,
            'penyampaian5'  =>  $penyampaian5,
            'penyampaian6'  =>  $penyampaian6,
            'penyampaian7'  =>  $penyampaian7,
            'penyampaian8'  =>  $penyampaian8,
            'penyampaian9'  =>  $penyampaian9,
            'penyampaian10'  =>  $penyampaian10,
            'jumlah_review' => $jumlahReview,
            'jumlahCaraMengajar' => $hasilJumlahCaraMengajar,
            'jumlahPenyampaianMateri' => $hasilJumlahPenyampaianMateri,
            'hasil_satu' => $hasilSatu,
            'hasil_dua' => $hasilDua,
            'hasil_satu_dua' => $jumlahSatuDua,
            'hasil_final' => $hasilFinal,
            'hasi_akhir' => $hasilAkhir
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/review/detail');
        $this->load->view('templates/footer');
    }

    public function saran($id_dosen)
    {
        $getUser = $this->Model_user->getUser();
        $daftarSaran = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen])->result_array();

        $data = [
            'getUser'      => $getUser,
            'daftar_saran' => $daftarSaran
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/review/saran_mahasiswa');
        $this->load->view('templates/footer');
    }
}
