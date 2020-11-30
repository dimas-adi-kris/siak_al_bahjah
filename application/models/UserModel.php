<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class UserModel extends CI_Model
{

    public function getListTabel()
    {
        $sql = "SELECT * FROM role";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getListTabelJoin()
    {
        $sql = "SELECT
        u.*,
        r.nama AS nama_role
      FROM
        user u
        JOIN `role` r ON r.id_role = u.id_role
      ";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data)
    {
        $sql = "INSERT INTO
        `user` (
          `id_user`,
          `id_role`,
          `password`,
          `email`
        )
      VALUES
        (
          '" . $data['id_user'] . "',
          '" . $data['id_role'] . "',
          '" . $data['password'] . "',
          '" . $data['email'] . "'
        )";
        $status = $this->db->query($sql);
        return $status;
    }

    public function tesexist()
    {
        $sql = "SELECT EXISTS(SELECT * FROM `user` WHERE id_user=0)";
        $res_query = $this->db->query($sql);
        // print_r($res_query->result_array());
        return $res_query->result_array();

        // $sql = "SELECT * FROM role";
        // $res = $this->db->query($sql);
        // return $res->result_array();
    }

    public function updateData($data)
    {
        $sql = "UPDATE `user`
              SET
                  `id_role` = '" . $data['id_role'] . "',
                  `password` = '" . $data['password'] . "',
                  `email` = '" . $data['email'] . "'
              WHERE id_user = " . $data['id_user'] . "";

        $status = $this->db->query($sql);

        return $status;
    }

    public function getDataById($id)
    {
        $sql = "SELECT
        u.*,
        r.nama AS nama_role
      FROM
        user u
        JOIN role r ON r.id_role = u.id_role
        WHERE u.id_user = " . $id . "";
        $res = $this->db->query($sql);

        // print_r($res->result_array());
        return $res->result_array()[0];
    }

    public function hapusData($id_user)
    {
        $sql = "DELETE FROM user WHERE id_user=" . $id_user . "";
        $res = $this->db->query($sql);
        return $res;
    }
}
