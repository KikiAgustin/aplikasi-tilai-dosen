<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_madu extends CI_Model
{

    public function pesanMadu()
    {

        $tanggal = date('d-m-Y');
        $nama = htmlspecialchars($this->input->post('nama', true));
        $penyakit = htmlspecialchars($this->input->post('penyakit', true));
        $nomor = htmlspecialchars($this->input->post('nomor', true));
        $alamat = htmlspecialchars($this->input->post('alamat', true));
        $jumlah = htmlspecialchars($this->input->post('jumlah', true));
        $status = "0";

        $data = [
            'tanggal_pemesanan' => $tanggal,
            'nama' => $nama,
            'penyakit' => $penyakit,
            'nomor' => $nomor,
            'alamat' => $alamat,
            'jumlah' => $jumlah,
            'status' => $status
        ];

        $this->db->insert('madu', $data);
    }

    public function pembelianMadu()
    {
        $this->db->order_by('id_madu', 'DESC');
        return $this->db->get('madu')->result_array();
    }

    public function getIdMadu($id_madu)
    {
        return $this->db->get_where('madu', ['id_madu' => $id_madu])->row_array();
    }

    public function editPesananMadu()
    {

        $status = $this->input->post('status', true);

        $data = [

            'status' => $status
        ];

        $this->db->where('id_madu', $this->input->post('id_madu'));
        $this->db->update('madu', $data);
    }

    public function hapusPesananMadu($id_madu)
    {
        return $this->db->delete('madu', ['id_madu' => $id_madu]);
    }

    public function jumlahMadu()
    {
        return $this->db->get('madu')->num_rows();
    }
}
