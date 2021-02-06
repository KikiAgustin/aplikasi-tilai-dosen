<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dosen extends CI_Model
{

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
        $prodi = htmlspecialchars($this->input->post('prodi'));
        $quotes = htmlspecialchars($this->input->post('quotes'));
        // $foto = htmlspecialchars($this->input->post('foto'));

        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '3000';
            $config['upload_path'] = './assets/user/img/dosen/';

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

        if (empty($foto_baru)) $foto_baru = "dosen-default.png";

        $data = [
            'nama' => $namaDosen,
            'mengajar' => $prodi,
            'quotes' => $quotes,
            'image' => $foto_baru
        ];

        $this->db->insert('daftar_dosen', $data);
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
            $config['upload_path'] = './assets/user/img/dosen/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                if ($gambar_dosen != 'dosen-default.png') {
                    unlink(FCPATH . 'assets/user/img/dosen/' . $gambar_dosen);
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

    // Halama Penilaian

    public function daftarNilaiDosen()
    {
        $this->db->join('daftar_dosen', 'daftar_dosen.id_daftar_dosen = hasil_penilaian.id_daftar_dosen ', 'left');

        return $this->db->get('hasil_penilaian')->result_array();
    }

    public function hasilNilai($id_dosen)
    {
        for ($i = 1; $i < 10; $i++) {
            $sql = "SELECT SUM(rating1) AS rating1 FROM hasil_penilaian WHERE id_daftar_dosen='$id_dosen' AND rating1='$i' ";
            $result = $this->db->query($sql);
            // $sql = "SELECT rating1,rating2 FROM hasil_penilaian WHERE id_daftar_dosen='$id_dosen' ";
            // return $this->db->query($sql)->result_array();
        }
        return $result->row()->rating1;
    }
}
