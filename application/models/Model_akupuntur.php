<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_akupuntur extends CI_Model
{

    public function pesanAkupuntur()
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

        $this->db->insert('akupuntur', $data);
    }

    public function pembelianAkupuntur()
    {
        $this->db->order_by('id_akupuntur', 'DESC');
        return $this->db->get('akupuntur')->result_array();
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

    public function hapusPesananAkupuntur($id_akupuntur)
    {
        return $this->db->delete('akupuntur', ['id_akupuntur' => $id_akupuntur]);
    }

    public function jumlahAkupuntur()
    {
        return $this->db->get('akupuntur')->num_rows();
    }
}
