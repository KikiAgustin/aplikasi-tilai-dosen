<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data = [
            'judul' => "Aplikasi Penilaian Dosen"
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/index');
        $this->load->view('template_user/footer');
    }

    public function home()
    {
        $daftarDosen = $this->Model_dosen->dosenHome();
        $email = $this->session->userdata('email');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $nama = $user['name'];
        $id_user = $user['id'];
        $image = $user['image'];

        $periode = $this->db->get_where('periode', ['status' => 1])->row_array();

        $data = [
            'judul'         => "Aplikasi Penilaian Dosen | Home",
            'daftar_dosen'  => $daftarDosen,
            'nama_user'     => $nama,
            'id_user'       => $id_user,
            'image'         => $image,
            'periode'       => $periode,
            'semester'       => $periode['semester'],
            'tahun'         => $periode['periode']
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/home');
        $this->load->view('template_user/footer');
    }

    public function daftarDosen()
    {
        $daftarDosen = $this->db->get('daftar_dosen')->result_array();
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $id_user = $user['id'];

        $periode = $this->db->get_where('periode', ['status' => 1])->row_array();

        $data = [
            'judul' => "Aplikasi Penilaian Dosen | Daftar Dosen",
            'daftar_dosen'  => $daftarDosen,
            'id_user'       => $id_user,
            'periode'       => $periode,
            'semester'       => $periode['semester'],
            'tahun'         => $periode['periode']
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/daftar_dosen');
        $this->load->view('template_user/footer');
    }

    public function riviewDosen($id_daftar_dosen)
    {
        $periode = $this->db->get_where('periode', ['status' => 1])->row_array();
        $statusPeriode = $periode['status'];
        $tahun         = $periode['periode'];
        $semester      = $periode['semester'];

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Maaf</strong> untuk mulai menilai silahkan login terlebih dahulu <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('AuthUser');
        } else if ($statusPeriode) {
            $riviewDosen = $this->db->get_where('daftar_dosen', ['id_daftar_dosen' => $id_daftar_dosen])->row_array();

            $email = $this->session->userdata('email');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();
            $idUser = $user['id'];
            $nama = $user['name'];

            $data = [
                'judul' => "Aplikasi Penilaian Dosen | Riview Dosen",
                'riviewDosen' => $riviewDosen,
                'id_user'     => $idUser,
                'nama_user'   => $nama,
                'tahun'       => $tahun,
                'semester'    => $semester
            ];

            $this->load->view('user/riview_dosen', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Maaf</strong> untuk sekarang tidak ada periode yang harus dinilai <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('User/daftarDosen');
        }
    }


    public function hasilRiviewDosen()
    {
        $rating1 = $_POST['rating1'];
        $rating2 = $_POST['rating2'];
        $saran = $_POST['saran'];
        $id_dosen = $_POST['id_dosen'];
        $id_user = $_POST['id_user'];
        $nama_user = $_POST['nama_user'];
        $cek_read = $_POST['cek_read'];
        $periode = $_POST['periode'];
        $semester = $_POST['semester'];

        if ($rating1 == null) {
            redirect('User/home');
        }

        $data = [
            'rating1' => $rating1,
            'rating2' => $rating2,
            'saran' => $saran,
            'id_daftar_dosen' => $id_dosen,
            'pilihan' => $rating1,
            'pilihan2' => $rating2,
            'id_user' => $id_user,
            'nama_user' => $nama_user,
            'cek_read' => $cek_read,
            'periode'  => $periode,
            'semester'  => $semester
        ];

        $this->db->insert('hasil_penilaian', $data);
        $this->session->set_userdata('save_berhasil', $id_user);
    }

    public function berhasil()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Maaf</strong> untuk mulai Menilai silahkan login terlebih dahulu <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('AuthUser');
        } else if ($this->session->userdata('save_berhasil')) {
            $data = [
                'judul' => "Aplikasi Penilaian Dosen | Berhasil"
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('user/berhasil');
            $this->load->view('template_user/footer');

            $this->session->unset_userdata('save_berhasil');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center mt-5 alert-dismissible fade show" role="alert">
            <strong>Anda tidak bisa megakses halaman ini</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('User/blangkPage');
        }
    }

    public function blankPage()
    {
        $data = [
            'judul' => "Blank Page"
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('user/blank_page');
        $this->load->view('templates/footer');
    }

    public function pageNot()
    {
        $data = [
            'judul' => "Blank Page"
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('user/page_not');
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Maaf</strong> untuk mulai Menilai silahkan login terlebih dahulu <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Authuser');
        }

        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        $data = [
            'judul' => "Aplikasi Penilaian Dosen | Profile",
            'user'  => $user

        ];

        $this->load->view('user/profile', $data);
    }

    public function editProfile()
    {

        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        $data = [
            'judul' => "Aplikasi Penilaian Dosen | Edit Profile",
            'user'  => $user

        ];

        $this->load->view('user/edit_profile', $data);
    }

    public function saveEditProfile()
    {

        $foto_lawas = $this->input->post('foto_lawas');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '3000';
            $config['upload_path'] = './assets/user/img/user/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                if ($foto_lawas != 'default.png') {
                    unlink(FCPATH . 'assets/user/img/user/' . $foto_lawas);
                }
                $foto_baru = $this->upload->data('file_name');
            } else {
                $error =  $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                ' . $error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('User/editProfile');
            }
        }

        if (empty($foto_baru)) $foto_baru = $foto_lawas;

        $email = $this->session->userdata('email');

        $this->db->set('name', $nama_lengkap);
        $this->db->set('image', $foto_baru);
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Profil Berhasil diedit
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
        redirect('User/profile');
    }
}
