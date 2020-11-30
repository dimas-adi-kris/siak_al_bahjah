<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class SekolahModel extends CI_Model
{

    public function getSekolahById($id)
    {
        $sql = "SELECT * FROM info_sekolah WHERE id=" . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }
    public function updateData($data)
    {
        $newId = $this->session->userdata('sekolah_id');
        $sql = "UPDATE info_sekolah SET 
                nama_lengkap='" . $data['nama_lengkap'] . "',
                singkatan='" . $data['singkatan'] . "',
                alamat='" . $data['alamat'] . "',
                telepon='" . $data['telepon'] . "',
                email='" . $data['email'] . "'
                WHERE id=" . $newId . "";
        $res = $this->db->query($sql);
        return $res;
    }
}
