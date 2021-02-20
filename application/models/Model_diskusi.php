<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_diskusi extends CI_Model
{
    public function informasiPenting()
    {
        $this->db->order_by('id_diskusi', 'DESC');
        return $this->db->get_where('diskusi', ['user' => 0, 'penting' => 1])->result_array();
    }

    public function tambahDiskusi()
    {
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $id_user = $user['id'];
        $diskusi = htmlspecialchars($this->input->post('tulis_diskusi', true));
        $tanggal = time();

        $data = [

            'id_user'   => $id_user,
            'diskusi'   => $diskusi,
            'tanggal'   => $tanggal,
            'user'      => 1
        ];

        $this->db->insert('diskusi', $data);
    }

    public function hasilDiskusi()
    {
        $this->db->order_by('id_diskusi', 'DESC');
        $this->db->where('penting', 0);
        $this->db->where('user', 1);
        return $this->db->get('diskusi')->result_array();
    }

    public function getUser()
    {
        $email = $this->session->userdata('email');
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }


    // Balasan
    public function balasan($id_diskusi)
    {

        $this->db->order_by('id_balasan', 'ASC');
        return $this->db->get_where('balasan', ['id_diskusi' => $id_diskusi])->result_array();
    }

    public function pembalas($id_diskusi)
    {

        $diskusi = $this->db->get_where('diskusi', ['id_diskusi' => $id_diskusi])->row_array();
        $id_user = $diskusi['id_user'];

        return $this->db->get_where('user', ['id' => $id_user])->row_array();
    }

    public function tambahBalasan($id_diskusi)
    {

        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $id_user = $user['id'];

        $balasan = htmlspecialchars($this->input->post('tulis_balasan', true));

        $data = [
            'id_diskusi' => $id_diskusi,
            'id_user'    => $id_user,
            'balasan'    => $balasan,
            'tanggal'    => time()
        ];

        $this->db->insert('balasan', $data);
    }


    // Balasan Diskusi

    public function cekBalasan($id_diskusi, $id_balasan)
    {

        $this->db->order_by('id_balasan_diskusi', 'DESC');
        return $this->db->get_where('balasan_postingan', ['id_diskusi' => $id_diskusi, 'id_balasan' => $id_balasan])->result_array();
    }

    public function tambahBalasanDiskusi($id_diskusi, $id_balasan)
    {

        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $id_user = $user['id'];

        $balasan = htmlspecialchars($this->input->post('tulis_balasan', true));

        $data = [
            'id_diskusi'    => $id_diskusi,
            'id_balasan'    => $id_balasan,
            'id_user'       => $id_user,
            'balasan'       => $balasan,
            'tanggal'       => time()
        ];

        $this->db->insert('balasan_postingan', $data);
    }

    public function cekPembalas($id_balasan)
    {
        return $this->db->get_where('user', ['id' => $id_balasan])->row_array();
    }

    // Profil postingan

    public function postingan()
    {
        $email = $this->session->userdata('email');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        $id_user = $user['id'];

        $this->db->order_by('id_diskusi', 'DESC');
        return $this->db->get_where('diskusi', ['id_user' => $id_user])->result_array();
    }

    public function lihatPostingan($id_profile)
    {
        $user = $this->db->get_where('user', ['id' => $id_profile])->row_array();
        $id_user = $user['id'];

        $this->db->order_by('id_diskusi', 'DESC');
        return $this->db->get_where('diskusi', ['id_user' => $id_user])->result_array();
    }

    public function pilihanDiskusi($id_diskusi)
    {

        return $this->db->get_where('diskusi', ['id_diskusi' => $id_diskusi])->row_array();
    }

    public function pilihanBalasan($id_balasan)
    {

        return $this->db->get_where('balasan', ['id_balasan' => $id_balasan])->row_array();
    }

    public function pilihanBalasanPostingan($id_balasan)
    {

        return $this->db->get_where('balasan_postingan', ['id_balasan_diskusi' => $id_balasan])->row_array();
    }

    public function editDiskusi($id_diskusi)
    {

        $diskusi = $this->input->post('edit_diskusi');

        $this->db->set('diskusi', $diskusi);
        $this->db->where('id_diskusi', $id_diskusi);
        $this->db->update('diskusi');
    }

    public function editBalasan($id_balasan)
    {

        $balasan = $this->input->post('edit_balasan');

        $this->db->set('balasan', $balasan);
        $this->db->where('id_balasan', $id_balasan);
        $this->db->update('balasan');
    }

    public function editBalasanPostingan($id_balasan)
    {

        $balasan = $this->input->post('edit_balasan');

        $this->db->set('balasan', $balasan);
        $this->db->where('id_balasan_diskusi', $id_balasan);
        $this->db->update('balasan_postingan');
    }
}
