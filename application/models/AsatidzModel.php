<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class AsatidzModel extends CI_Model
{

    public function getListJenisAsatidz()
    {
        $sql = "SELECT * FROM jenis_kelamin";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getListAsatidz()
    {
        $sql = "SELECT
        r.*,
        jr.jenis_kelamin AS nama_jenis_kelamin
      FROM
        guru r
        JOIN jenis_kelamin jr ON jr.id_jenis_kelamin = r.id_jenis_kelamin
      ";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data)
    {
        $telepon = $data['telepon'];
        if ($telepon == "") {
            $telepon = 0;
        }

        $sql = "INSERT INTO
        `guru` (
          `nama_lengkap`,
          `id_jenis_kelamin`,
          `telepon`,
          `alamat`
        )
      VALUES
        (
          '" . $data['nama_lengkap'] . "',
          '" . $data['id_jenis_kelamin'] . "',
          '" . $telepon . "',
          '" . $data['alamat'] . "'
        )";
        // $data['telepon']
        $status = $this->db->query($sql);

        if ($status) {
            $sql = "SELECT LAST_INSERT_ID()";
            $res = $this->db->query($sql);
            $newId = $res->result_array();
            $newId = $newId[0]['LAST_INSERT_ID()'];
            return $this->getDataById($newId);
        } else {
            return false;
        }
    }

    public function updateData($data){
      $telepon = $data['telepon'];
      if($telepon==""){
        $telepon=0;
      }
      $sql = "UPDATE `guru`
              SET `nama_lengkap` = '".$data['nama_lengkap']."',
                  `id_jenis_kelamin` = '".$data['id_jenis_kelamin']."',
                  `telepon` = '".$data['telepon']."',
                  `alamat` = '".$data['alamat']."'
              WHERE jenis_kelamin = ".$data['jenis_kelamin']."";

      $status = $this->db->query($sql);

      return $status;
    }

    public function getDataById($id)
    {
        $sql = "SELECT
        r.*,
        jr.jenis_kelamin AS nama_jenis_kelamin
      FROM
        guru r
        JOIN jenis_kelamin jr ON jr.id_jenis_kelamin = r.id_jenis_kelamin
        WHERE r.jenis_kelamin = " . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }

    public function hapusData($jenis_kelamin){
      $sql = "DELETE FROM guru WHERE jenis_kelamin=".$jenis_kelamin."";
      $res = $this->db->query($sql);
      return $res;
    }
}
