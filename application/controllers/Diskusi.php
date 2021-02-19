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

        $pemosting = $this->Model_diskusi->pembalas($id_diskusi);
        $balasan = $this->Model_diskusi->balasan($id_diskusi);

        $this->form_validation->set_rules('tulis_balasan', 'Balasan', 'required|trim', [
            'required' => "Komentar tidak boleh kosong"
        ]);

        if ($this->form_validation->run() == false) {
            $data = [
                'judul'     => "Aplikasi Penilaian Dosen | Balasan Diskusi",
                'balasan'   => $balasan,
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
        $balasan = $this->Model_diskusi->cekBalasan($id_diskusi, $id_balasan);
        $pembalas = $this->Model_diskusi->cekPembalas($id_balasan);

        $this->form_validation->set_rules('tulis_balasan', 'Balasan', 'required|trim', [
            'required' => "Komentar tidak boleh kosong"
        ]);

        if ($this->form_validation->run() == false) {

            $data = [
                'judul'     => "Aplikasi Penilaian Dosen | Diskusi",
                'balasan'   => $balasan,
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
        $this->db->delete('diskusi', ['id_diskusi' => $id_diskusi]);
        $this->db->delete('balasan', ['id_diskusi' => $id_diskusi]);
        $this->db->delete('balasan_postingan', ['id_diskusi' => $id_diskusi]);

        $this->session->set_flashdata('message', '<div style="margin-top: 300px;"  class="alert alert-success alert-dismissible fade show mt-3 text-center" role="alert"> <strong>Postingan</strong> berhasil dihapus <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
        redirect('Diskusi/postingan');
    }
}
