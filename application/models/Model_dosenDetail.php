<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dosenDetail extends CI_Model
{
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

    // Jumlah Reviewer 
    public function jumlahReview($id_dosen, $id_periode)
    {
        $periode = $this->db->get_where('periode', ['id_periode' => $id_periode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }

    public function jumlahCaraMengajarDetail($id_dosen, $id_periode)
    {
        $periode = $this->db->get_where('periode', ['id_periode' => $id_periode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];

        $query = "SELECT SUM(rating1) AS rating1 FROM hasil_penilaian WHERE id_daftar_dosen='$id_dosen' AND semester='$semester' AND periode='$getPeriode' ";
        return $this->db->query($query)->row_array();
    }
    public function jumlahPenyampaianMatariDetail($id_dosen, $id_periode)
    {
        $periode = $this->db->get_where('periode', ['id_periode' => $id_periode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];

        $query = "SELECT SUM(rating2) AS rating2 FROM hasil_penilaian WHERE id_daftar_dosen='$id_dosen' AND semester='$semester' AND periode='$getPeriode' ";
        return $this->db->query($query)->row_array();
    }
}
