<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthDosen extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('akses_dosen')) {
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
                'judul' => "Halaman login | Dosen"
            ];

            $this->load->view('template_auth/header', $data);
            $this->load->view('dosen/login');
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

                if ($user['role_id'] == 3) {
                    // Cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email_dosen' => $user['email'],
                            'akses_dosen' => "dosen"
                        ];
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat Datang Dihalaman Dosen </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                        redirect('Dosen');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" > Password salah! </div>');
                        redirect('AuthDosen');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" > Anda bukan seorang dosen </div>');
                    redirect('AuthDosen');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" > Email ini belum aktif! </div>');
                redirect('AuthDosen');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" > Email tidak terdaftar! </div>');
            redirect('AuthDosen');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('akses_dosen');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" >Anda berhasil Keluar!</div>');
        redirect('AuthDosen');
    }
}
