<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthUser extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('Admin');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Field ini wajib diisi',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Field ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {

            $data = [
                'judul' => "Aplikasi Review Dosen | Login"
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('user/login_user');
            $this->load->view('template_user/footer');
        } else {
            // Validasi Lolos
            $this->_login();
        }
    }

    private function _login()
    {

        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // Cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat Datang Dihalaman Admin </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('Admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" > Password salah! </div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" > Email ini belum aktif! </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" > Email tidak terdaftar! </div>');
            redirect('Auth');
        }
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

    public function saveRegistrasi()
    {
        $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $emailReady = $this->db->get_where('mahasiswa', ['email' => $email])->result_array();

        if ($emailReady == false) {
            $data = [
                'nama_lengkap' => $nama_lengkap,
                'email' => $email,
                'image' => "default.jpg",
                'password' => $password,
                'is_active' => "1",
                'role_id' => "1"
            ];

            $this->db->insert('mahasiswa', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>Selamat</strong> Akun anda sekarang sudah aktif. Silahkan Review dosen yang ada di mata kuliah kamu
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');

            $hasilData = array(
                'status' => "OK",
                'email' => $email,
                'email-jadi' => $emailReady
            );
            echo json_encode($hasilData);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Maaf</strong> Email yang anda masukan sudah terdaftar, silahkan masukan email yang lain
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            $hasilData = array(
                'status' => "ERROR",
                'email' => $email,
                'email-jadi' => $emailReady
            );
            echo json_encode($hasilData);
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('email');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" >Anda berhasil Keluar!</div>');
        redirect('Auth');
    }
}
