<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    public function dataUser()
    {
        $this->db->where('role_id', 2);
        return $this->db->get('user')->result_array();
    }

    public function dataAdmin()
    {
        $this->db->where('role_id', 1);
        return $this->db->get('user')->result_array();
    }

    public function tambahDataUser()
    {

        $name = htmlspecialchars($this->input->post('name', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $aktif = "1";
        $role = "1";

        $data = array(
            'name' => $name,
            'email' => $email,
            'image' => "default.png",
            'password' => $password,
            'is_active' => $aktif,
            'role_id' => $role
        );

        $this->db->insert('user', $data);
    }

    public function jumlahHariIni()
    {

        $hari = date('d');
        $hariIni = $hari - 1;
        $pembelian = date('Y-m-') . $hariIni;

        $this->db->where('tanggal', $pembelian);
        return $this->db->get('jumlah_keseluruhan')->num_rows();
    }

    // public function jumlahHariIni()
    // {
    //     return $this->db->query("SELECT pembelian FROM jumlah_keseluruhan WHERE tanggal='2020-09-20' ")->result_array();
    // }

    public function totalJumlah()
    {
        return $this->db->get('jumlah_keseluruhan')->num_rows();
    }

    public function hapusDataUser($id)
    {
        return $this->db->delete('user', ['id' => $id]);
    }

    public function getUser()
    {

        $user = $this->session->userdata('email_admin');

        return $this->db->get_where('user', ['email' => $user])->row_array();
    }

    // Informasi

    public function informasi()
    {
        $this->db->order_by('id_diskusi', 'DESC');
        return $this->db->get_where('diskusi', ['user' => 0])->result_array();
    }

    public function tambahInformasi()
    {
        $email = $this->session->userdata('email_admin');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $id_user = $user['id'];

        $judul = htmlspecialchars($this->input->post('judul'), true);
        $isi   = $this->input->post('isi', true);

        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '3000';
            $config['upload_path'] = '././assets/img/informasi/';

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
                redirect('Admin/tambahInformasi');
            }
        }

        if (empty($foto_baru)) $foto_baru = "";

        $data = [
            'id_user' => $id_user,
            'judul'   => $judul,
            'image'   => $foto_baru,
            'diskusi' => $isi,
            'tanggal' => time(),
            'penting' => 1
        ];

        $this->db->insert('diskusi', $data);
    }

    public function editInformasi($id_diskusi)
    {

        $judul = htmlspecialchars($this->input->post('judul'), true);
        $gambar_lama = htmlspecialchars($this->input->post('foto_lawas'), true);
        $isi   = $this->input->post('isi', true);

        $gambar = $_FILES['foto']['name'];

        if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '3000';
            $config['upload_path'] = '././assets/img/informasi/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                if ($gambar_lama != 'default.png') {
                    // unlink(FCPATH . 'assets/img/informasi/' . $gambar_lama);
                    unlink('http://149.129.180.250:84/assets/img/informasi/' . $gambar_lama);
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
                redirect('Admin/editInformasi/' . $id_diskusi);
            }
        }

        if (empty($foto_baru)) $foto_baru = $gambar_lama;


        $this->db->set('image', $foto_baru);
        $this->db->set('diskusi', $isi);
        $this->db->set('judul', $judul);
        $this->db->where('id_diskusi', $id_diskusi);
        $this->db->update('diskusi');
    }
}
