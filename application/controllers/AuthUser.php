<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthUser extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('User/home');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Kolom ini wajib diisi',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
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
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"><strong>Login </strong> berhasil silahkan mereview dosen yang ada di mata kuliah kamu <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                    redirect('User/daftarDosen');
                } else {
                    $this->session->set_flashdata('auth_user', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> Password salah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                    redirect('AuthUser');
                }
            } else {
                $this->session->set_flashdata('auth_user', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> Email ini belum aktif <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                redirect('AuthUser');
            }
        } else {
            $this->session->set_flashdata('auth_user', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> Email tidak terdaftar <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('AuthUser');
        }
    }

    public function registrasiUser()
    {
        if ($this->session->userdata('email')) {
            redirect('User/home');
        }

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', [
            'required' => 'Kolom nama lengkap harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]', [
            'required' => 'Kolom email harus diisi',
            'is_unique' => 'Email ini sudah terdaftar, silahkan masukan email yang lain'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password1]', [
            'required' => 'Kolom ini harus diisi',
            'min_length' => 'Password minimal 8 karakter',
            'matches' => 'Isi password harus sama'
        ]);
        $this->form_validation->set_rules('password1', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password]', [
            'required' => 'Kolom ini harus diisi',
            'min_length' => 'Password minimal 8 karakter',
            'matches' => 'Isi password harus sama'
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'judul' => "Aplikasi Review Dosen | Registrasi"
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('user/registrasi_user');
            $this->load->view('template_user/footer');
        } else {
            $nama_lengkap = htmlspecialchars($_POST['nama_lengkap'], true);
            $email = htmlspecialchars($_POST['email'], true);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $data = [
                'name' => $nama_lengkap,
                'email' => $email,
                'image' => "default.png",
                'password' => $password,
                'date_created' => time(),
                'is_active' => 0,
                'role_id' => 2
            ];

            // Siapkan Token

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert"> Halo
                         <strong>' . $nama_lengkap  . '</strong> Selamat akunmu sudah terdaftar, silahkan melakukan aktivasi terlebih dahulu melalui link yang dikirim ke email
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>');
            redirect('AuthUser');
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            'smtp_user'     => 'davidabdul306@gmail.com',
            'smtp_pass'     => 'AXfNnZPwkCd2Pc6',
            'smtp_port'     => 465,
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'newline'       => "\r\n"
        ];

        $email = htmlspecialchars($_POST['email'], true);

        $this->email->initialize($config);

        if ($type == 'verify') {
            $this->email->from('davidabdul306@gmail.com', 'Kiki Agustin');
            $this->email->to($email);
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link untuk verifikasi akun : <a href="' . base_url() . 'AuthUser/verify?email=' . $email . '&token=' . urlencode($token) . ' " >Verifikasi Sekarang</a> ');
        } else if ($type == 'forgot') {
            $this->email->from('davidabdul306@gmail.com', 'Kiki Agustin');
            $this->email->to($email);
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link untuk reset password : <a href="' . base_url() . 'AuthUser/resetPassword?email=' . $email . '&token=' . urlencode($token) . ' " >Reset Password</a> ');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $userToken = $this->db->get_where('user_token', ['token' => $token])->row_array();
            $waktuToken = $userToken['date_created'];

            if ($userToken) {

                if (time() - $waktuToken < (60 * 60 * 24)) {

                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Selamat</strong> Email anda sudah aktif, silahkan login! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                    redirect('AuthUser');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert">  aktivasi gagal dilakukan, karena token sudah tidak berlaku<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                    redirect('AuthUser/registrasiUser');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> aktivasi gagal dilakukan, karena token tidak valid <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                redirect('AuthUser/registrasiUser');
            }
        } else {
            $this->session->set_flashdata('auth_user', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> aktivasi gagal dilakukan, karena email belum terdaftar <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('AuthUser/registrasiUser');
        }
    }


    public function lupaPassword()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim', [
            'required' => "Kolom ini wajib diisi"
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'judul' => "Aplikasi Review Dosen | Lupa Password"
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('user/lupa_password');
            $this->load->view('template_user/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            $userAktif = $user['is_active'];

            if ($user) {
                if ($userAktif == 1) {

                    $token = base64_encode(random_bytes(32));

                    $userToken = [
                        'email' => $email,
                        'token' => $token,
                        'date_created' => time()
                    ];

                    $this->db->insert('user_token', $userToken);
                    $this->_sendEmail($token, 'forgot');

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> Silahkan cek email untuk reset password<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                    redirect('AuthUser/lupaPassword');
                } else {
                    $this->session->set_flashdata('auth_user', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> Email ini belum di aktivasi <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                    redirect('AuthUser/lupaPassword');
                }
            } else {
                $this->session->set_flashdata('auth_user', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> Email tidak terdaftar diaplikasi <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                redirect('AuthUser/lupaPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $cekToken = $this->db->get_where('user_token', ['token' => $token])->row_array();
        $waktuToken = $cekToken['date_created'];


        if ($user) {

            if ($cekToken) {
                if (time() - $waktuToken < (60 * 60 * 24)) {

                    $this->session->set_userdata('reset_password', $email);
                    $this->masukanPassword();
                } else {

                    $this->db->delete('user_token', ['token' => $token]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> Token sudah tidak berlaku, silahkan masukan email kembali  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                    redirect('AuthUser/lupaPassword');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> Token tidak valid  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                redirect('AuthUser/registrasiUser');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> Email tidak terdaftar diaplikasi, Silahkan registrasi terlebih dahulu <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('AuthUser/registrasiUser');
        }
    }

    public function masukanPassword()
    {
        if (!$this->session->userdata('reset_password')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center mt-5 alert-dismissible fade show" role="alert">
            <strong>Anda tidak bisa megakses halaman ini</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('User/blangkPage');
        }

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password1]', [
            'required' => 'Kolom ini harus diisi',
            'min_length' => 'Password minimal 8 karakter',
            'matches' => 'Isi password harus sama'
        ]);
        $this->form_validation->set_rules('password1', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password]', [
            'required' => 'Kolom ini harus diisi',
            'min_length' => 'Password minimal 8 karakter',
            'matches' => 'Isi password harus sama'
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'judul' => "Aplikasi Review Dosen | Ganti Password"
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('user/ganti_password');
            $this->load->view('template_user/footer');
        } else {

            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_password');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_password');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert">Password kamu berhasil diganti, silahkan login <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('AuthUser');
        }
    }


    public function logout()
    {

        $this->session->unset_userdata('email');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert">Anda berhasil keluar!!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        redirect('AuthUser');
    }
}
