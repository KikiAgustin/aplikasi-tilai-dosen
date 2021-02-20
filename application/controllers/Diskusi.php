<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diskusi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Maaf</strong> untuk melihat diskusi silahkan login terlebih dahulu <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('AuthUser');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('tulis_diskusi', 'Tulis Diskusi', 'required|trim', [
            'required' => "Isi Diskusi Tidak Boleh Kosong"
        ]);

        if ($this->form_validation->run() == false) {

            $user = $this->Model_diskusi->getUser();
            $diskusi = $this->Model_diskusi->hasilDiskusi();
            $informasi = $this->Model_diskusi->informasiPenting();
            $data = [
                'judul'     => "Aplikasi Penilaian Dosen | Diskusi",
                'diskusi'   => $diskusi,
                'user'      => $user,
                'informasi' => $informasi
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('user/diskusi/diskusi');
            $this->load->view('template_user/footer');
        } else {
            $this->Model_diskusi->tambahDiskusi();
            $this->session->set_flashdata('message', '<div style="margin-top: 66px;" class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Diskusi anda</strong> berhasil diposting <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi');
        }
    }

    public function balasan($id_diskusi)
    {

        $user = $this->Model_diskusi->getUser();
        $pemosting = $this->Model_diskusi->pembalas($id_diskusi);
        $balasan = $this->Model_diskusi->balasan($id_diskusi);

        $this->form_validation->set_rules('tulis_balasan', 'Balasan', 'required|trim', [
            'required' => "Komentar tidak boleh kosong"
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'judul'     => "Aplikasi Penilaian Dosen | Balasan Diskusi",
                'balasan'   => $balasan,
                'user'      => $user,
                'pemosting' => $pemosting
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('user/diskusi/balasan');
            $this->load->view('template_user/footer');
        } else {
            $this->Model_diskusi->tambahBalasan($id_diskusi);
            $this->session->set_flashdata('message', '<div  class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Komentar</strong> berhasil ditambahkan <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi/balasan/' . $id_diskusi . ' ');
        }
    }

    public function balasanPostingan($id_diskusi, $id_balasan)
    {
        $user = $this->Model_diskusi->getUser();
        $balasan = $this->Model_diskusi->cekBalasan($id_diskusi, $id_balasan);
        $pembalas = $this->Model_diskusi->cekPembalas($id_balasan);

        $this->form_validation->set_rules('tulis_balasan', 'Balasan', 'required|trim', [
            'required' => "Komentar tidak boleh kosong"
        ]);

        if ($this->form_validation->run() == false) {

            $data = [
                'judul'     => "Aplikasi Penilaian Dosen | Diskusi",
                'balasan'   => $balasan,
                'user'      => $user,
                'pembalas'  => $pembalas
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('user/diskusi/balasan_postingan');
            $this->load->view('template_user/footer');
        } else {
            $this->Model_diskusi->tambahBalasanDiskusi($id_diskusi, $id_balasan);
            $this->session->set_flashdata('message', '<div  class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Komentar</strong> berhasil ditambahkan <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi/balasanPostingan/' . $id_diskusi . '/' . $id_balasan . '');
        }
    }


    public function postingan()
    {
        $postingan = $this->Model_diskusi->postingan();

        $data = [
            'judul'     => "Aplikasi Penilaian Dosen | Diskusi",
            'postingan'  => $postingan
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/diskusi/postingan');
        $this->load->view('template_user/footer');
    }

    public function hapusPostingan($id_diskusi)
    {
        $user = $this->Model_diskusi->getUser();
        $id_user = $user['id'];

        $cekHapus = $this->db->get_where('diskusi', ['id_diskusi' => $id_diskusi, 'id_user' => $id_user])->row_array();

        if ($cekHapus) {
            $this->db->delete('diskusi', ['id_diskusi' => $id_diskusi]);
            $this->db->delete('balasan', ['id_diskusi' => $id_diskusi]);
            $this->db->delete('balasan_postingan', ['id_diskusi' => $id_diskusi]);

            $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Postingan</strong> berhasil dihapus <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi/postingan');
        } else {
            $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Maaf</strong> Anda tidak punya hak menghapus diskusi ini <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi/postingan');
        }
    }

    public function hapusDiskusi($id_diskusi)
    {
        $user = $this->Model_diskusi->getUser();
        $id_user = $user['id'];

        $cekHapus = $this->db->get_where('diskusi', ['id_diskusi' => $id_diskusi, 'id_user' => $id_user])->row_array();

        if ($cekHapus) {
            $this->db->delete('diskusi', ['id_diskusi' => $id_diskusi]);
            $this->db->delete('balasan', ['id_diskusi' => $id_diskusi]);
            $this->db->delete('balasan_postingan', ['id_diskusi' => $id_diskusi]);

            $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Postingan</strong> berhasil dihapus <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi');
        } else {
            $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Maaf</strong> Anda tidak punya hak menghapus diskusi ini <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi');
        }
    }

    public function hapusBalasan($id_balasan, $id_diskusi)
    {

        $user = $this->Model_diskusi->getUser();
        $id_user = $user['id'];

        $cekHapus = $this->db->get_where('balasan', ['id_balasan' => $id_balasan, 'id_user' => $id_user])->row_array();

        if ($cekHapus) {
            $this->db->delete('balasan', ['id_balasan' => $id_balasan]);
            $this->db->delete('balasan_postingan', ['id_balasan' => $id_balasan]);

            $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Postingan</strong> berhasil dihapus <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi/balasan/' . $id_diskusi);
        } else {
            $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Maaf</strong> Anda tidak punya hak menghapus balasan ini <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi/balasan/' . $id_diskusi);
        }
    }

    public function hapusBalasanPostingan($id_diskusi, $id_balasan)
    {

        $user = $this->Model_diskusi->getUser();
        $id_user = $user['id'];

        $cekHapus = $this->db->get_where('balasan_postingan', ['id_balasan_diskusi' => $id_balasan, 'id_user' => $id_user])->row_array();

        if ($cekHapus) {
            $this->db->delete('balasan_postingan', ['id_balasan_diskusi' => $id_balasan]);

            $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Postingan</strong> berhasil dihapus <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi/balasanPostingan/' . $id_diskusi . '/' . $id_balasan);
        } else {
            $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Maaf</strong> Anda tidak punya hak menghapus balasan ini <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi/balasanPostingan/' . $id_diskusi . '/' . $id_balasan);
        }
    }

    public function editDiskusi($id_diskusi)
    {

        $user = $this->Model_diskusi->getUser();
        $id_user = $user['id'];

        $cekEdit = $this->db->get_where('diskusi', ['id_diskusi' => $id_diskusi, 'id_user' => $id_user])->row_array();

        if ($cekEdit) {

            $diskusi = $this->Model_diskusi->pilihanDiskusi($id_diskusi);

            $this->form_validation->set_rules('edit_diskusi', 'Edit diskusi', 'required', [
                'required'   => "Form ini tidak boleh kosong"
            ]);

            if ($this->form_validation->run() == false) {
                $data = [
                    'judul'     => "Aplikasi Penilaian Dosen | Edit Diskusi",
                    'diskusi'   => $diskusi

                ];

                $this->load->view('template_user/header', $data);
                $this->load->view('user/diskusi/edit_diskusi');
                $this->load->view('template_user/footer');
            } else {
                $this->Model_diskusi->editDiskusi($id_diskusi);
                $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Diskusi</strong> Berhasil diedit <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                redirect('Diskusi');
            }
        } else {
            $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Maaf</strong> Anda tidak punya hak mengedit diskusi ini <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi');
        }
    }

    public function editBalasan($id_balasan, $id_diskusi)
    {

        $user = $this->Model_diskusi->getUser();
        $id_user = $user['id'];

        $cekEdit = $this->db->get_where('balasan', ['id_balasan' => $id_balasan, 'id_user' => $id_user])->row_array();

        if ($cekEdit) {

            $balasan = $this->Model_diskusi->pilihanBalasan($id_balasan);

            $this->form_validation->set_rules('edit_balasan', 'Edit diskusi', 'required', [
                'required'   => "Form ini tidak boleh kosong"
            ]);

            if ($this->form_validation->run() == false) {
                $data = [
                    'judul'     => "Aplikasi Penilaian Dosen | Edit Balasan",
                    'balasan'   => $balasan

                ];

                $this->load->view('template_user/header', $data);
                $this->load->view('user/diskusi/edit_balasan');
                $this->load->view('template_user/footer');
            } else {
                $this->Model_diskusi->editBalasan($id_balasan);
                $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Diskusi</strong> Berhasil diedit <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
                redirect('Diskusi/balasan/' . $id_diskusi);
            }
        } else {
            $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Maaf</strong> Anda tidak punya hak mengedit balasan ini <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi/balasan/' . $id_diskusi);
        }
    }

    public function cekProfile($id_profile)
    {
        $user = $this->db->get_where('user', ['id' => $id_profile])->row_array();

        $data = [
            'judul' => "Aplikasi Penilaian Dosen | Profile",
            'user'  => $user

        ];

        $this->load->view('user/diskusi/profile', $data);
    }

    public function lihatPostingan($id_profile)
    {
        $postingan = $this->Model_diskusi->lihatPostingan($id_profile);

        $data = [
            'judul'     => "Aplikasi Penilaian Dosen | Lihat Postingan",
            'postingan'  => $postingan
        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/diskusi/lihat_postingan');
        $this->load->view('template_user/footer');
    }

    public function likePostingan($id_postingan, $id_user)
    {
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        $like = $this->db->get_where('like_postingan', ['id_postingan' => $id_postingan, 'id_user' => $id_user, 'from_like' => $user['id']])->row_array();
        $status = $like['status'];
        $id_like    = $like['id_like_postingan'];

        if (!$like) {
            $data = [
                'id_postingan' => $id_postingan,
                'id_user'      => $id_user,
                'from_like'    => $user['id'],
                'status'       => 1,
                'tanggal'      => time()
            ];

            $this->db->insert('like_postingan', $data);
            redirect('Diskusi');
        } else {
            if ($status == 1) {
                $this->db->set('status', 0);
                $this->db->where('id_like_postingan', $id_like);
                $this->db->update('like_postingan');
                redirect('Diskusi');
            } else {
                $this->db->set('status', 1);
                $this->db->where('id_like_postingan', $id_like);
                $this->db->update('like_postingan');
                redirect('Diskusi');
            }
        }
    }

    public function lihatLike($id_diskusi)
    {
        $like = $this->db->get_where('like_postingan', ['id_postingan' => $id_diskusi])->result_array();
        $pemosting = $this->Model_diskusi->pembalas($id_diskusi);
        $data = [
            'judul'     => "Aplikasi Penilaian Dosen | Like Postingan",
            'like'      => $like,
            'pemosting' => $pemosting

        ];

        $this->load->view('template_user/header', $data);
        $this->load->view('user/diskusi/lihat_like');
        $this->load->view('template_user/footer');
    }

    public function pilihan($id_diskusi)
    {
        $user = $this->Model_diskusi->getUser();
        $id_user = $user['id'];

        $cekPilihan = $this->db->get_where('diskusi', ['id_diskusi' => $id_diskusi, 'id_user' => $id_user])->row_array();

        if ($cekPilihan) {

            $pilihan = $this->Model_diskusi->pilihanDiskusi($id_diskusi);
            $data = [
                'judul'     => "Aplikasi Penilaian Dosen | Pilihan",
                'pilihan'   => $pilihan
            ];

            $this->load->view('template_user/header', $data);
            $this->load->view('user/diskusi/pilihan');
            $this->load->view('template_user/footer');
        } else {
            $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-danger alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Maa</strong> anda tidak mempunyai hak untuk mengakases halaman ini <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
            redirect('Diskusi');
        }
    }
}
