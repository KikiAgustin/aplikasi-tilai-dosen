<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
    $getUser = $this->Model_user->getUser();

    $jumlahDosen =  $this->Model_dosen->jumlahDosen();
    $jumlahUser = $this->Model_dosen->jumlahUser();
    $jumlahReview = $this->Model_dosen->jumlahIndexReview();
    $jumlahAdmin = $this->Model_dosen->jumlahIndexAdmin();


    if (empty($jumlahDosen)) $jumlahDosen = "Tidak Ada";
    if (empty($jumlahUser)) $jumlahUser = "Tidak Ada";
    if (empty($jumlahReview)) $jumlahReview = "Tidak Ada";
    if (empty($jumlahAdmin)) $jumlahAdmin = "Tidak Ada";


    $data = [
      'getUser' => $getUser,
      'jumlah_dosen' => $jumlahDosen,
      'jumlahUser' => $jumlahUser,
      'jumlahreview' => $jumlahReview,
      'jumlahAdmin' => $jumlahAdmin
    ];

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }

  public function dataAdmin()
  {
    $this->load->model('Model_user');
    $data['data_admin'] =  $this->Model_user->dataAdmin();
    $data['getUser'] = $this->Model_user->getUser();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/data_admin', $data);
    $this->load->view('templates/footer');
  }

  // Daftar Dosen

  public function daftarDosen()
  {
    $this->load->model('Model_dosen');
    $daftar_dosen = $this->Model_dosen->dataDosen();
    $getUser = $this->Model_user->getUser();

    $data = [
      'daftar_dosen' => $daftar_dosen,
      'getUser'      => $getUser
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('admin/daftar_dosen');
    $this->load->view('templates/footer');
  }

  public function hapusDosen($id_dosen)
  {
    $daftar_dosen = $this->db->get_where('daftar_dosen', ['id_daftar_dosen' => $id_dosen])->row_array();
    $id_gambar  = $daftar_dosen['image'];

    if ($id_gambar != 'default.png') {
      unlink(FCPATH . 'assets/user/img/dosen/' . $id_gambar);
    }

    $this->load->model('Model_dosen');
    $this->Model_dosen->hapusDosen($id_dosen);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Dosen Berhasil dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('Admin/daftarDosen');
  }

  public function tambahDosen()
  {
    $getUser = $this->Model_user->getUser();

    $data = [
      'getUser' => $getUser

    ];

    $this->form_validation->set_rules('nama', 'Nama Dosen', 'required|trim');
    $this->form_validation->set_rules('prodi', 'Dosen Dari Prodi', 'required|trim');
    $this->form_validation->set_rules('quotes', 'Quotes', 'required|trim');
    $this->form_validation->set_rules('email', 'email', 'required|trim|is_unique[user.email]');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password1]');
    $this->form_validation->set_rules('password1', 'Konformasi Password', 'required|trim|matches[password]');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('admin/tambah_dosen');
      $this->load->view('templates/footer');
    } else {
      $this->load->model('Model_dosen');
      $this->Model_dosen->tambahDataDosen();
      $this->Model_dosen->tambahAkunDosen();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Dosen Berhasil ditambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Admin/daftarDosen');
    }
  }

  public function editDosen($id_dosen)
  {
    $this->load->model('Model_dosen');
    $data = [
      'getUser' => $this->Model_user->getUser(),
      'edit_dosen' => $this->Model_dosen->getIdDosen($id_dosen)
    ];

    $this->form_validation->set_rules('nama', 'Nama Dosen', 'required|trim');
    $this->form_validation->set_rules('prodi', 'Dosen Dari Prodi', 'required|trim');
    $this->form_validation->set_rules('quotes', 'Quotes', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('admin/edit_dosen');
      $this->load->view('templates/footer');
    } else {
      $this->load->model('Model_dosen');
      $this->Model_dosen->editDosen();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Dosen Berhasil diedit</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Admin/daftarDosen');
    }
  }


  // Method User
  public function user()
  {
    $this->load->model('Model_user');
    $data['data_user'] =  $this->Model_user->dataUser();
    $data['getUser'] = $this->Model_user->getUser();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/data_user', $data);
    $this->load->view('templates/footer');
  }

  public function tambahDataUser()
  {

    $data['getUser'] = $this->Model_user->getUser();

    $this->form_validation->set_rules('name', 'Nama', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]');
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]');

    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/tambah_data_user');
      $this->load->view('templates/footer');
    } else {
      $this->load->model('Model_user');
      $this->Model_user->tambahDataUser();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>User Berhasil ditambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Admin/user');
    }
  }

  public function hapusDataUser($id)
  {
    $this->load->model('Model_user');
    $this->Model_user->hapusDataUser($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>User Berhasil dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('Admin/user');
  }

  // Periode
  public function periode()
  {
    $periode = $this->Model_dosen->periode();

    $data = [
      'judul' => "Periode",
      'getUser' => $this->Model_user->getUser(),
      'periode' => $periode
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('admin/periode');
    $this->load->view('templates/footer');
  }

  public function ubahPeriode($id_periode)
  {

    $periode = $this->db->get_where('periode', ['id_periode' => $id_periode])->row_array();

    $status = $periode['status'];

    $cekStatus = $this->db->get_where('periode', ['status' => 1])->row_array();

    if ($status == 1) {

      $this->db->set('status', 2);
      $this->db->where('id_periode', $id_periode);
      $this->db->update('periode');
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Periode berhasil diubah menjadi selasai </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Admin/periode');
    } else if ($status == 0) {
      if ($cekStatus) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>periode yang aktif hanya boleh ada satu, silahkan ubah status terlebih dahulu menjadi selesai periode yang aktif </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('Admin/periode');
      } else {
        $this->db->set('status', 1);
        $this->db->where('id_periode', $id_periode);
        $this->db->update('periode');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Periode berhasil diubah menjadi aktif </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('Admin/periode');
      }
    }
  }

  public function tambahPeriode()
  {
    $semester = $this->input->post('semester');
    $tanggal_awal = htmlspecialchars($this->input->post('tanggal_awal'));
    $tanggal_akhir = htmlspecialchars($this->input->post('tanggal_akhir'));

    $periode = $tanggal_awal . "/" . $tanggal_akhir;

    $cekPeriode = $this->db->get_where('periode', ['semester' => $semester, 'periode' => $periode])->row_array();

    if ($cekPeriode) {

      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Maaf untuk semester ' . $semester . ' dan tahun ajaran ' . $periode . ' sudah ada, mungkin anda salah memasukan </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Admin/periode');
    }

    $data = [
      'semester' => $semester,
      'tanggal' => time(),
      'periode' => $periode
    ];

    $this->db->insert('periode', $data);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Periode berhasil ditambah </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('Admin/periode');
  }

  public function informasi()
  {
    $informasi = $this->Model_user->informasi();
    $data = [
      'judul' => "Informasi",
      'getUser' => $this->Model_user->getUser(),
      'informasi' => $informasi
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('admin/informasi');
    $this->load->view('templates/footer');
  }

  public function tambahInformasi()
  {

    $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
    $this->form_validation->set_rules('isi', 'Isi Informasi', 'required');

    if ($this->form_validation->run() == false) {

      $data = [
        'judul' => "Tambah Informasi",
        'getUser' => $this->Model_user->getUser(),
      ];

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('admin/tambah_informasi');
      $this->load->view('templates/footer');
    } else {
      $this->Model_user->tambahInformasi();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Informasi Berhasil ditambahkan </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Admin/informasi');
    }
  }

  public function hapusInformasi($id_diskusi)
  {

    $this->db->delete('diskusi', ['id_diskusi' => $id_diskusi]);
    $this->db->delete('balasan', ['id_diskusi' => $id_diskusi]);
    $this->db->delete('balasan_postingan', ['id_diskusi' => $id_diskusi]);

    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Informasi Berhasil ditambahkan </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('Admin/informasi');
  }

  public function editInformasi($id_diskusi)
  {

    $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
    $this->form_validation->set_rules('isi', 'Isi Informasi', 'required');

    if ($this->form_validation->run() == false) {

      $data = [
        'judul'     => "Edit Informasi",
        'getUser'   => $this->Model_user->getUser(),
        'informasi' => $this->db->get_where('diskusi', ['id_diskusi' => $id_diskusi])->row_array()
      ];

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('admin/edit_informasi');
      $this->load->view('templates/footer');
    } else {
      $this->Model_user->editInformasi($id_diskusi);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Informasi Berhasil diedit </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Admin/informasi');
    }
  }


  public function selesaikanInformasi($id_diskusi)
  {
    $diskusi = $this->db->get_where('diskusi', ['id_diskusi' => $id_diskusi])->row_array();
    $status = $diskusi['penting'];

    if ($status == 1) {
      $this->db->set('penting', 2);
      $this->db->where('id_diskusi', $id_diskusi);
      $this->db->update('diskusi');
    } else {
      $this->db->set('penting', 1);
      $this->db->where('id_diskusi', $id_diskusi);
      $this->db->update('diskusi');
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Informasi Berhasil diselesaikan </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('Admin/informasi');
  }

  public function detailInformasi($id_diskusi)
  {

    $data = [
      'judul'     => "Edit Informasi",
      'getUser'   => $this->Model_user->getUser(),
      'informasi' => $this->db->get_where('diskusi', ['id_diskusi' => $id_diskusi])->row_array()
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('admin/detail_informasi');
    $this->load->view('templates/footer');
  }
}
