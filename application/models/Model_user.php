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
}
