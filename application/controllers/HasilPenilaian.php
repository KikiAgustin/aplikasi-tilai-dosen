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
                <strong>Mohon Maaf untuk dosen ini belum ada Penilaian yang masuk!!</strong>
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

        // Lihat Berdasarkan periode

        $periode = $this->Model_dosen->tampilperiode();
        $data = [
            'getUser'       => $this->Model_user->getUser(),
            'dosen_detail'  => $dosenDetail,
            'mengajar1'     => $mengajar1,
            'mengajar2'     => $mengajar2,
            'mengajar3'     => $mengajar3,
            'mengajar4'     => $mengajar4,
            'mengajar5'     => $mengajar5,
            'mengajar6'     => $mengajar6,
            'mengajar7'     => $mengajar7,
            'mengajar8'     => $mengajar8,
            'mengajar9'     => $mengajar9,
            'mengajar10'    => $mengajar10,
            'penyampaian1'  =>  $penyampaian1,
            'penyampaian2'  =>  $penyampaian2,
            'penyampaian3'  =>  $penyampaian3,
            'penyampaian4'  =>  $penyampaian4,
            'penyampaian5'  =>  $penyampaian5,
            'penyampaian6'  =>  $penyampaian6,
            'penyampaian7'  =>  $penyampaian7,
            'penyampaian8'  =>  $penyampaian8,
            'penyampaian9'  =>  $penyampaian9,
            'penyampaian10' =>  $penyampaian10,
            'jumlah_review' => $jumlahReview,
            'jumlahCaraMengajar'        => $hasilJumlahCaraMengajar,
            'jumlahPenyampaianMateri'   => $hasilJumlahPenyampaianMateri,
            'hasil_satu'                => $hasilSatu,
            'hasil_dua'                 => $hasilDua,
            'hasil_satu_dua'            => $jumlahSatuDua,
            'hasil_final'               => $hasilFinal,
            'hasi_akhir'                => $hasilAkhir,
            'tampil_periode'            => $periode
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
        $daftarSaran = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen, 'read_admin' => 0])->result_array();
        $sudahBaca = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen, 'read_admin' => 1])->result_array();
        $bintangAdmin = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen, 'bintang_admin' => 1])->result_array();

        $data = [
            'getUser'      => $getUser,
            'daftar_saran' => $daftarSaran,
            'sudah_baca'   => $sudahBaca,
            'bintan_admin' => $bintangAdmin
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/review/saran_mahasiswa');
        $this->load->view('templates/footer');
    }


    public function readAdmin($id_penilaian)
    {
        $bintang = $this->db->get_where('hasil_penilaian', ['id_penilaian' => $id_penilaian])->row_array();
        $id_dosen = $bintang['id_daftar_dosen'];

        $this->db->set('read_admin', 1);
        $this->db->where('id_penilaian', $id_penilaian);
        $this->db->update('hasil_penilaian');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Saran sudah ditandai telah dibaca</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('HasilPenilaian/saran/' . $id_dosen);
    }

    public function bintangAdmin($id_bintang)
    {

        $bintang = $this->db->get_where('hasil_penilaian', ['id_penilaian' => $id_bintang])->row_array();
        $id_dosen = $bintang['id_daftar_dosen'];

        $this->db->set('bintang_admin', 1);
        $this->db->where('id_penilaian', $id_bintang);
        $this->db->update('hasil_penilaian');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Saran sudah ditandai</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('HasilPenilaian/saran/' . $id_dosen);
    }

    // Lihat periode

    public function lihatPeriode($idPeriode, $idDosen)
    {

        $getUser = $this->Model_user->getUser();
        // $idPeriode = $this->input->get('periode');
        // $idDosen = $this->input->get('dosen');
        $getPeriode = $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $dosen_detail = $this->db->get_where('daftar_dosen', ['id_daftar_dosen' => $idDosen])->row_array();
        $nama_dosen = $dosen_detail['nama'];
        $periode = $this->Model_dosen->getHasilPeriode($idPeriode, $idDosen);

        if ($periode) {
            // Cara Mengajar
            $id_dosen = $idDosen;
            $mengajar1 = $this->Model_periode->mengajar1($id_dosen, $idPeriode);
            $mengajar2 = $this->Model_periode->mengajar2($id_dosen, $idPeriode);
            $mengajar3 = $this->Model_periode->mengajar3($id_dosen, $idPeriode);
            $mengajar4 = $this->Model_periode->mengajar4($id_dosen, $idPeriode);
            $mengajar5 = $this->Model_periode->mengajar5($id_dosen, $idPeriode);
            $mengajar6 = $this->Model_periode->mengajar6($id_dosen, $idPeriode);
            $mengajar7 = $this->Model_periode->mengajar7($id_dosen, $idPeriode);
            $mengajar8 = $this->Model_periode->mengajar8($id_dosen, $idPeriode);
            $mengajar9 = $this->Model_periode->mengajar9($id_dosen, $idPeriode);
            $mengajar10 = $this->Model_periode->mengajar10($id_dosen, $idPeriode);

            // Penyampaian Materi
            $penyampaian1 = $this->Model_periode->penyampaian1($id_dosen, $idPeriode);
            $penyampaian2 = $this->Model_periode->penyampaian2($id_dosen, $idPeriode);
            $penyampaian3 = $this->Model_periode->penyampaian3($id_dosen, $idPeriode);
            $penyampaian4 = $this->Model_periode->penyampaian4($id_dosen, $idPeriode);
            $penyampaian5 = $this->Model_periode->penyampaian5($id_dosen, $idPeriode);
            $penyampaian6 = $this->Model_periode->penyampaian6($id_dosen, $idPeriode);
            $penyampaian7 = $this->Model_periode->penyampaian7($id_dosen, $idPeriode);
            $penyampaian8 = $this->Model_periode->penyampaian8($id_dosen, $idPeriode);
            $penyampaian9 = $this->Model_periode->penyampaian9($id_dosen, $idPeriode);
            $penyampaian10 = $this->Model_periode->penyampaian10($id_dosen, $idPeriode);

            //  Jumlah yang menilai
            $jumlahReview = $this->Model_periode->jumlahReview($id_dosen, $idPeriode);
            $jumlahCaraMengajar = $this->Model_periode->jumlahCaraMengajar($id_dosen, $idPeriode);
            $hasilJumlahCaraMengajar = $jumlahCaraMengajar['rating1'];
            $jumlahPenyampaianMateri = $this->Model_periode->jumlahPenyampaianMatari($id_dosen, $idPeriode);
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
                'getUser'       => $getUser,
                'dosen_detail'  => $dosen_detail,
                'getPeriode'    => $getPeriode,
                'mengajar1'     => $mengajar1,
                'mengajar2'     => $mengajar2,
                'mengajar3'     => $mengajar3,
                'mengajar4'     => $mengajar4,
                'mengajar5'     => $mengajar5,
                'mengajar6'     => $mengajar6,
                'mengajar7'     => $mengajar7,
                'mengajar8'     => $mengajar8,
                'mengajar9'     => $mengajar9,
                'mengajar10'    => $mengajar10,
                'penyampaian1'  =>  $penyampaian1,
                'penyampaian2'  =>  $penyampaian2,
                'penyampaian3'  =>  $penyampaian3,
                'penyampaian4'  =>  $penyampaian4,
                'penyampaian5'  =>  $penyampaian5,
                'penyampaian6'  =>  $penyampaian6,
                'penyampaian7'  =>  $penyampaian7,
                'penyampaian8'  =>  $penyampaian8,
                'penyampaian9'  =>  $penyampaian9,
                'penyampaian10' =>  $penyampaian10,
                'jumlah_review' =>  $jumlahReview,
                'jumlahCaraMengajar'        => $hasilJumlahCaraMengajar,
                'jumlahPenyampaianMateri'   => $hasilJumlahPenyampaianMateri,
                'hasil_satu'                => $hasilSatu,
                'hasil_dua'                 => $hasilDua,
                'hasil_satu_dua'            => $jumlahSatuDua,
                'hasil_final'               => $hasilFinal,
                'hasi_akhir'                => $hasilAkhir,
                'tampil_periode'            => $periode
            ];

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('admin/review/hasil_periode');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf untuk periode ini ' . $nama_dosen . ' Tidak ada yang memberikan penilaian  </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('HasilPenilaian/detail/' . $idDosen);
        }
    }

    public function saranPeriode()
    {
        $id_dosen = $this->input->get('dosen');
        $idPeriode = $this->input->get('periode');
        $periode = $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $getUser = $this->Model_user->getUser();
        $daftarSaran = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen, 'read_admin' => 0, 'semester' => $semester, 'periode' => $getPeriode])->result_array();
        $sudahBaca = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen, 'read_admin' => 1, 'semester' => $semester, 'periode' => $getPeriode])->result_array();
        $bintangAdmin = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen, 'bintang_admin' => 1, 'semester' => $semester, 'periode' => $getPeriode])->result_array();

        $data = [
            'getUser'      => $getUser,
            'daftar_saran' => $daftarSaran,
            'sudah_baca'   => $sudahBaca,
            'bintan_admin' => $bintangAdmin
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/review/saran_mahasiswa');
        $this->load->view('templates/footer');
    }
}
