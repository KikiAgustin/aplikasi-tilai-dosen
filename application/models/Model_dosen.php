<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dosen extends CI_Model
{

    public function getUser()
    {
        $dosen = $this->session->userdata('email_dosen');

        return $this->db->get_where('user', ['email' => $dosen])->row_array();
    }

    public function dataDosen()
    {
        $this->db->order_by('id_daftar_dosen', 'DESC');
        return $this->db->get('daftar_dosen')->result_array();
    }

    public function hapusDosen($id_dosen)
    {
        return $this->db->delete('daftar_dosen', ['id_daftar_dosen' => $id_dosen]);
    }

    public function tambahDataDosen()
    {
        $namaDosen = htmlspecialchars($this->input->post('nama'));
        $email = htmlspecialchars($this->input->post('email'), true);
        $prodi = htmlspecialchars($this->input->post('prodi'));
        $quotes = htmlspecialchars($this->input->post('quotes'));

        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '3000';
            $config['upload_path'] = 'http://149.129.180.250:84/assets/user/img/dosen/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto_baru = $this->upload->data('file_name');
            } else {
                $error =  $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>' . $error . '</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Admin/tambahDosen');
            }
        }

        if (empty($foto_baru)) $foto_baru = "default.png";

        $data = [
            'nama' => $namaDosen,
            'email' => $email,
            'mengajar' => $prodi,
            'quotes' => $quotes,
            'image' => $foto_baru
        ];

        $this->db->insert('daftar_dosen', $data);
    }

    public function getIdTerakhir()
    {
        $this->db->order_by('id_daftar_dosen', 'DESC');
        return  $this->db->get('daftar_dosen', 1)->row_array();
    }

    public function tambahAkunDosen()
    {
        $namaDosen = htmlspecialchars($this->input->post('nama'), true);
        $email = htmlspecialchars($this->input->post('email'), true);
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $foto_baru = "default.png";

        $data = [
            'name'          => $namaDosen,
            'email'         => $email,
            'image'         => $foto_baru,
            'password'      => $password,
            'date_created'  => time(),
            'is_active'     => 1,
            'role_id'       => 3
        ];

        $this->db->insert('user', $data);
    }

    public function getIdDosen($id_dosen)
    {
        return $this->db->get_where('daftar_dosen', ['id_daftar_dosen' => $id_dosen])->row_array();
    }

    public function editDosen()
    {
        $id_dosen = $this->input->post('id_dosen');
        $namaDosen = htmlspecialchars($this->input->post('nama'));
        $prodi = htmlspecialchars($this->input->post('prodi'));
        $quotes = htmlspecialchars($this->input->post('quotes'));
        $dosen = $this->db->get_where('daftar_dosen', ['id_daftar_dosen' => $id_dosen])->row_array();
        $gambar_dosen = $dosen['image'];

        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '3000';
            $config['upload_path'] = 'http://149.129.180.250:84/assets/user/img/dosen/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                if ($gambar_dosen != 'default.png') {
                    // unlink(FCPATH . 'assets/user/img/dosen/' . $gambar_dosen);
                    unlink('http://149.129.180.250:84/assets/user/img/dosen/' . $gambar_dosen);
                }
                $foto_baru = $this->upload->data('file_name');
            } else {
                $error =  $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>' . $error . '</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Admin/editDosen/' . $id_dosen);
            }
        }

        if (empty($foto_baru)) $foto_baru = $gambar_dosen;

        $data = [
            'nama' => $namaDosen,
            'mengajar' => $prodi,
            'quotes' => $quotes,
            'image' => $foto_baru
        ];
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->update('daftar_dosen', $data);
    }

    // Untuk halaman user
    public function dosenHome()
    {
        return  $this->db->get('daftar_dosen', 4)->result_array();
    }

    public function jumlahDosen()
    {
        return $this->db->get('daftar_dosen')->num_rows();
    }

    public function jumlahUser()
    {
        return  $this->db->get_where('user', ['is_active' => 1, 'role_id' => 2])->num_rows();
    }

    public function jumlahIndexReview()
    {
        return $this->db->get('hasil_penilaian')->num_rows();
    }

    public function jumlahIndexAdmin()
    {
        return  $this->db->get_where('user', ['is_active' => 1, 'role_id' => 1])->num_rows();
    }

    // Halama Penilaian

    public function daftarDosenNilai()
    {
        $query = "SELECT DISTINCT id_daftar_dosen FROM hasil_penilaian";
        return $this->db->query($query)->result_array();
    }

    public function daftarNilaiDosen()
    {
        $this->db->join('daftar_dosen', 'daftar_dosen.id_daftar_dosen = hasil_penilaian.id_daftar_dosen ', 'left');

        return $this->db->get('hasil_penilaian')->result_array();
    }

    public function cekDosen($id_dosen)
    {
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }

    // Cara mengajar
    public function mengajar1($id_dosen)
    {
        $pilihan = "1";

        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar2($id_dosen)
    {
        $pilihan = "2";

        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar3($id_dosen)
    {
        $pilihan = "3";

        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar4($id_dosen)
    {
        $pilihan = "4";

        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar5($id_dosen)
    {
        $pilihan = "5";

        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar6($id_dosen)
    {
        $pilihan = "6";

        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar7($id_dosen)
    {
        $pilihan = "7";

        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar8($id_dosen)
    {
        $pilihan = "8";

        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar9($id_dosen)
    {
        $pilihan = "9";

        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar10($id_dosen)
    {
        $pilihan = "10";

        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }

    // Penyampaian Materi
    public function penyampaian1($id_dosen)
    {
        $pilihan = "1";

        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian2($id_dosen)
    {
        $pilihan = "2";

        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian3($id_dosen)
    {
        $pilihan = "3";

        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian4($id_dosen)
    {
        $pilihan = "4";

        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian5($id_dosen)
    {
        $pilihan = "5";

        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian6($id_dosen)
    {
        $pilihan = "6";

        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian7($id_dosen)
    {
        $pilihan = "7";

        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian8($id_dosen)
    {
        $pilihan = "8";

        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian9($id_dosen)
    {
        $pilihan = "9";

        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian10($id_dosen)
    {
        $pilihan = "10";

        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }

    // Jumlah Reviewer 
    public function jumlahReview($id_dosen)
    {
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }

    public function jumlahCaraMengajar($id_dosen)
    {
        $query = "SELECT SUM(rating1) AS rating1 FROM hasil_penilaian WHERE id_daftar_dosen='$id_dosen' ";
        return $this->db->query($query)->row_array();
    }
    public function jumlahPenyampaianMatari($id_dosen)
    {
        $query = "SELECT SUM(rating2) AS rating2 FROM hasil_penilaian WHERE id_daftar_dosen='$id_dosen' ";
        return $this->db->query($query)->row_array();
    }


    // Cek email Mahasiswa
    public function cekEmail($email)
    {
        $this->db->where('email', $email);
        $this->db->from('mahasiswa');
        return $this->db->count_all_results();
    }

    // periode
    public function periode()
    {

        $this->db->order_by('id_periode', 'DESC');
        return $this->db->get('periode')->result_array();
    }

    public function tampilperiode()
    {
        $this->db->where('status', 2);
        return $this->db->get('periode')->result_array();
    }

    public function getHasilPeriode($idPeriode, $idDosen)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('id_daftar_dosen', $idDosen);
        return $this->db->get('hasil_penilaian')->result_array();
    }
}
