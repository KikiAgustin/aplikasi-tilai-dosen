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
        $id_dosen = $dosen['id_daftar_dosen'];
        $jumlahReview = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen])->num_rows();

        if (empty($jumlahReview)) {

            $data = [
                'judul'             => "Halaman Dosen | Home",
                'getUser'           => $getUser,
                'dosen'             => $dosen,
                'jumlah_review'     => "Tidak Ada",
                'hasil_final'       => "Tidak ada"
            ];

            $this->load->view('template_dosen/header', $data);
            $this->load->view('template_dosen/sidebar');
            $this->load->view('template_dosen/topbar');
            $this->load->view('dosen/index');
            $this->load->view('template_dosen/footer');
        } else {

            $jumlahCaraMengajar = $this->Model_dosenDetail->jumlahCaraMengajar($id_dosen);
            $hasilJumlahCaraMengajar = $jumlahCaraMengajar['rating1'];

            if ($hasilJumlahCaraMengajar == null) $hasilJumlahCaraMengajar = 0;

            $jumlahPenyampaianMateri = $this->Model_dosenDetail->jumlahPenyampaianMatari($id_dosen);
            $hasilJumlahPenyampaianMateri = $jumlahPenyampaianMateri['rating2'];

            if ($hasilJumlahPenyampaianMateri == null) $hasilJumlahPenyampaianMateri = 0;

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
                'judul'             => "Halaman Dosen | Home",
                'getUser'           => $getUser,
                'dosen'             => $dosen,
                'jumlah_review'     => $jumlahReview,
                'hasil_final'       => $hasilFinal
            ];

            $this->load->view('template_dosen/header', $data);
            $this->load->view('template_dosen/sidebar');
            $this->load->view('template_dosen/topbar');
            $this->load->view('dosen/index');
            $this->load->view('template_dosen/footer');
        }
    }

    public function periode()
    {
        $getUser = $this->Model_dosen->getUser();
        $email = $getUser['email'];
        $dosen =  $this->db->get_where('daftar_dosen', ['email' => $email])->row_array();
        $periode = $this->Model_dosen->tampilperiode();
        // var_dump($periode);
        // die;

        $data = [
            'judul'             => "Halaman Dosen | Periode ",
            'getUser'       => $getUser,
            'periode'       => $periode,
            'dosen'         => $dosen
        ];

        $this->load->view('template_dosen/header', $data);
        $this->load->view('template_dosen/sidebar');
        $this->load->view('template_dosen/topbar');
        $this->load->view('dosen/periode');
        $this->load->view('template_dosen/footer');
    }


    public function periodeDetail($id_periode)
    {
        $getUser = $this->Model_dosen->getUser();
        $email = $getUser['email'];
        $dosen =  $this->db->get_where('daftar_dosen', ['email' => $email])->row_array();
        $id_dosen = $dosen['id_daftar_dosen'];
        $nama_dosen = $dosen['nama'];
        $jumlahReview = $this->Model_dosenDetail->jumlahReview($id_dosen, $id_periode);


        $idPeriode = $id_periode;
        $idDosen = $id_dosen;
        $getPeriode = $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();

        $periode = $this->Model_dosen->getHasilPeriode($idPeriode, $idDosen);

        if ($periode) {

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

            $jumlahCaraMengajar = $this->Model_dosenDetail->jumlahCaraMengajarDetail($id_dosen, $id_periode);
            $hasilJumlahCaraMengajar = $jumlahCaraMengajar['rating1'];
            $jumlahPenyampaianMateri = $this->Model_dosenDetail->jumlahPenyampaianMatariDetail($id_dosen, $id_periode);
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
                'judul'             => "Halaman Admin | Detail Periode",
                'getUser'           => $getUser,
                'periode'           => $periode,
                'dosen'             => $dosen,
                'dosen_detail'      => $dosen,
                'mengajar1'         => $mengajar1,
                'mengajar2'         => $mengajar2,
                'mengajar3'         => $mengajar3,
                'mengajar4'         => $mengajar4,
                'mengajar5'         => $mengajar5,
                'mengajar6'         => $mengajar6,
                'mengajar7'         => $mengajar7,
                'mengajar8'         => $mengajar8,
                'mengajar9'         => $mengajar9,
                'mengajar10'        => $mengajar10,
                'penyampaian1'      => $penyampaian1,
                'penyampaian2'      => $penyampaian2,
                'penyampaian3'      => $penyampaian3,
                'penyampaian4'      => $penyampaian4,
                'penyampaian5'      => $penyampaian5,
                'penyampaian6'      => $penyampaian6,
                'penyampaian7'      => $penyampaian7,
                'penyampaian8'      => $penyampaian8,
                'penyampaian9'      => $penyampaian9,
                'penyampaian10'     => $penyampaian10,
                'jumlah_review'     => $jumlahReview,
                'jumlahCaraMengajar'        => $hasilJumlahCaraMengajar,
                'jumlahPenyampaianMateri'   => $hasilJumlahPenyampaianMateri,
                'hasil_satu'                => $hasilSatu,
                'hasil_dua'                 => $hasilDua,
                'hasil_satu_dua'            => $jumlahSatuDua,
                'hasil_final'               => $hasilFinal,
                'hasi_akhir'                => $hasilAkhir,
                'getPeriode'                => $getPeriode,
            ];

            $this->load->view('template_dosen/header', $data);
            $this->load->view('template_dosen/sidebar');
            $this->load->view('template_dosen/topbar');
            $this->load->view('dosen/hasil_periode');
            $this->load->view('template_dosen/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf untuk periode ini ' . $nama_dosen . ' belum ada yang memberikan penilaian  </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Dosen/periode');
        }
    }


    public function saranDetail($idDosen, $id_periode)
    {
        $id_dosen = $idDosen;
        $idPeriode = $id_periode;
        $periode = $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $getUser = $this->Model_dosen->getUser();
        $email = $getUser['email'];
        $dosen =  $this->db->get_where('daftar_dosen', ['email' => $email])->row_array();
        $daftarSaran = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen, 'read_dosen' => 0, 'semester' => $semester, 'periode' => $getPeriode])->result_array();
        $sudahBaca = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen, 'read_dosen' => 1, 'semester' => $semester, 'periode' => $getPeriode])->result_array();
        $bintangDosen = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen, 'bintang_dosen' => 1, 'semester' => $semester, 'periode' => $getPeriode])->result_array();

        $data = [
            'judul'        => "Halaman Dosen | Saran Mahasiswa",
            'getUser'      => $getUser,
            'dosen'        => $dosen,
            'daftar_saran' => $daftarSaran,
            'sudah_baca'   => $sudahBaca,
            'bintan_dosen' => $bintangDosen
        ];

        $this->load->view('template_dosen/header', $data);
        $this->load->view('template_dosen/sidebar');
        $this->load->view('template_dosen/topbar');
        $this->load->view('dosen/saran_mahasiswa');
        $this->load->view('template_dosen/footer');
    }


    public function readDosen($id_penilaian, $id_periode)
    {
        $bintang = $this->db->get_where('hasil_penilaian', ['id_penilaian' => $id_penilaian])->row_array();
        $id_dosen = $bintang['id_daftar_dosen'];

        $this->db->set('read_dosen', 1);
        $this->db->where('id_penilaian', $id_penilaian);
        $this->db->update('hasil_penilaian');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Saran sudah ditandai telah dibaca</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('Dosen/saranDetail/' . $id_dosen . '/' . $id_periode);
    }

    public function bintangDosen($id_bintang, $id_periode)
    {

        $bintang = $this->db->get_where('hasil_penilaian', ['id_penilaian' => $id_bintang])->row_array();
        $id_dosen = $bintang['id_daftar_dosen'];

        $this->db->set('bintang_dosen', 1);
        $this->db->where('id_penilaian', $id_bintang);
        $this->db->update('hasil_penilaian');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Saran sudah ditandai</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('Dosen/saranDetail/' . $id_dosen . '/' . $id_periode);
    }

    public function lihatNilai()
    {

        $getUser = $this->Model_dosen->getUser();
        $email = $getUser['email'];
        $nama_dosen = $getUser['name'];
        $dosen =  $this->db->get_where('daftar_dosen', ['email' => $email])->row_array();
        $id_dosen = $dosen['id_daftar_dosen'];

        $cekDosen = $this->Model_dosen->cekDosen($id_dosen);

        if ($cekDosen < 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Mohon Maaf untuk ' . $nama_dosen . ' belum ada Penilaian yang masuk!!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('Dosen/index');
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
            'judul'             => "Halaman Dosen | Lihat Nilai",
            'getUser'           => $getUser,
            'dosen'             => $dosen,
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
        ];

        $this->load->view('template_dosen/header', $data);
        $this->load->view('template_dosen/sidebar');
        $this->load->view('template_dosen/topbar');
        $this->load->view('dosen/lihat_nilai');
        $this->load->view('template_dosen/footer');
    }

    public function lihatSaran()
    {

        $getUser = $this->Model_dosen->getUser();
        $email = $getUser['email'];
        $dosen =  $this->db->get_where('daftar_dosen', ['email' => $email])->row_array();
        $id_dosen = $dosen['id_daftar_dosen'];

        $daftarSaran = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen, 'read_dosen' => 0])->result_array();
        $sudahBaca = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen, 'read_dosen' => 1])->result_array();
        $bintangDosen = $this->db->get_where('hasil_penilaian', ['id_daftar_dosen' => $id_dosen, 'bintang_dosen' => 1])->result_array();

        $data = [
            'judul'             => "Halaman Dosen | Lihat Saran",
            'getUser'           => $getUser,
            'dosen'             => $dosen,
            'daftar_saran' => $daftarSaran,
            'sudah_baca'   => $sudahBaca,
            'bintan_dosen' => $bintangDosen

        ];

        $this->load->view('template_dosen/header', $data);
        $this->load->view('template_dosen/sidebar');
        $this->load->view('template_dosen/topbar');
        $this->load->view('dosen/lihat_saran');
        $this->load->view('template_dosen/footer');
    }
}
