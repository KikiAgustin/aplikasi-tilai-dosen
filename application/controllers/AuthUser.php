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
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Login berhasil silahkan mereview dosen yang ada di mata kuliah kamu</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                    redirect('User/daftarDosen');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Password salah</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                    redirect('AuthUser');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Email ini belum aktif</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                redirect('AuthUser');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Email tidak terdaftar</strong> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
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
            'required' => 'Kolom email harus diisi',
            'min_length' => 'Password minimal 8 karakter',
            'matches' => 'Isi password harus sama'
        ]);
        $this->form_validation->set_rules('password1', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password]', [
            'required' => 'Kolom email harus diisi',
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
                'image' => "default.jpg",
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
            $this->email->message('Klik link untuk verifikasi akun : <a href="' . base_url() . 'Auth/verify?email=' . $email . '&token=' . urlencode($token) . ' " >Verifikasi Sekarang</a> ');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function logout()
    {

        $this->session->unset_userdata('email');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" >Anda berhasil Keluar!</div>');
        redirect('Auth');
    }
}
