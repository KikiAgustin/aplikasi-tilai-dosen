<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('akses_admin')) {
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
                'judul' => "Halaman Admin | Login"
            ];

            $this->load->view('template_auth/header', $data);
            $this->load->view('admin/login');
            $this->load->view('template_auth/footer');
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

                if ($user['role_id'] == 1) {
                    // Cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email_admin' => $user['email'],
                            'akses_admin' => "admin"
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
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" > Anda bukan seorang admin </div>');
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

    public function logout()
    {

        $this->session->unset_userdata('email_admin');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('akses_admin');
        $this->session->unset_userdata('akses_dosen');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" >Anda berhasil Keluar!</div>');
        redirect('Auth');
    }
}
