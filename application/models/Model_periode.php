<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_periode extends CI_Model
{

    // Cara mengajar
    public function mengajar1($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];

        $pilihan = "1";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar2($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];

        $pilihan = "2";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar3($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "3";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar4($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "4";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar5($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "5";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar6($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "6";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar7($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "7";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar8($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "8";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar9($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "9";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function mengajar10($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "10";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }

    // Penyampaian Materi
    public function penyampaian1($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "1";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian2($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "2";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian3($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "3";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian4($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "4";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian5($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "5";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian6($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "6";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian7($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "7";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian8($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "8";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian9($id_dosen, $idPeriode)
    {

        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "9";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }
    public function penyampaian10($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];
        $pilihan = "10";

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('pilihan2', $pilihan);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }


    // Jumlah Review
    public function jumlahReview($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];

        $this->db->where('periode', $getPeriode);
        $this->db->where('semester', $semester);
        $this->db->where('id_daftar_dosen', $id_dosen);
        $this->db->from('hasil_penilaian');
        return $this->db->count_all_results();
    }

    public function jumlahCaraMengajar($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];

        $query = "SELECT SUM(rating1) AS rating1 FROM hasil_penilaian WHERE id_daftar_dosen='$id_dosen' AND semester='$semester' AND periode='$getPeriode' ";
        return $this->db->query($query)->row_array();
    }

    public function jumlahPenyampaianMatari($id_dosen, $idPeriode)
    {
        $periode =  $this->db->get_where('periode', ['id_periode' => $idPeriode])->row_array();
        $semester = $periode['semester'];
        $getPeriode = $periode['periode'];

        $query = "SELECT SUM(rating2) AS rating2 FROM hasil_penilaian WHERE id_daftar_dosen='$id_dosen' AND semester='$semester' AND periode='$getPeriode' ";
        return $this->db->query($query)->row_array();
    }
}
