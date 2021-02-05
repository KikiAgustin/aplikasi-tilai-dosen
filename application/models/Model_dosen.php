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

    // Untuk halaman user
    public function dosenHome()
    {
        return  $this->db->get('daftar_dosen', 4)->result_array();
    }


    public function getIdAkupuntur($id_akupuntur)
    {
        return $this->db->get_where('akupuntur', ['id_akupuntur' => $id_akupuntur])->row_array();
    }

    public function editPesananAkupuntur()
    {

        $status = $this->input->post('status', true);

        $data = [

            'status' => $status
        ];

        $this->db->where('id_akupuntur', $this->input->post('id_akupuntur'));
        $this->db->update('akupuntur', $data);
    }



    public function jumlahAkupuntur()
    {
        return $this->db->get('akupuntur')->num_rows();
    }
}
