<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

    $data['jumlahAkupuntur'] =  $this->Model_akupuntur->jumlahAkupuntur();
    $data['jumlahMadu'] = $this->Model_madu->jumlahMadu();
    $data['jumlahHariIni'] = $this->Model_user->jumlahHariIni();
    $data['totalJumlah'] = $this->Model_user->totalJumlah();

    $data['getUser'] = $this->Model_user->getUser();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/index', $data);
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
    $data['getUser'] = $this->Model_user->getUser();

    $this->form_validation->set_rules('nama', 'Nama Dosen', 'required|trim');
    $this->form_validation->set_rules('prodi', 'Dosen Dari Prodi', 'required|trim');
    $this->form_validation->set_rules('quotes', 'Quotes', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar');
      $this->load->view('admin/tambah_dosen');
      $this->load->view('templates/footer');
    } else {
      $this->load->model('Model_dosen');
      $this->Model_dosen->tambahDataDosen();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Dosen Berhasil ditambah</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Admin/daftarDosen');
    }
  }


  public function editDataAkupuntur($id_akupuntur)
  {
    $this->load->model('Model_akupuntur');
    $data['edit_akupuntur'] =  $this->Model_akupuntur->getIdAkupuntur($id_akupuntur);

    $data['getUser'] = $this->Model_user->getUser();

    $this->form_validation->set_rules('status', 'Status', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header');
      $this->load->view('templates/sidebar');
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/edit_akupuntur', $data);
      $this->load->view('templates/footer');
    } else {
      $this->load->model('Model_akupuntur');
      $this->Model_akupuntur->editPesananAkupuntur();
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Pesanan Berhasil diedit</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('Admin/dataAkupuntur');
    }
  }

  // Akhir Akupuntur


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
}
