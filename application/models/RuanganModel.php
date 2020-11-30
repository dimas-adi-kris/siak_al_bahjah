<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class RuanganModel extends CI_Model
{

    public function getListJenisRuangan()
    {
        $sql = "SELECT * FROM jenis_ruangan";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getListRuangan()
    {
        $sql = "SELECT
        r.*,
        jr.nama AS nama_jenis_ruangan
      FROM
        ruangan r
        JOIN jenis_ruangan jr ON jr.id_jenis_ruangan = r.id_jenis_ruangan
      ";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data)
    {
        $kapasitas = $data['kapasitas'];
        if ($kapasitas == "") {
            $kapasitas = 0;
        }

        $sql = "INSERT INTO
        `ruangan` (
          `kode_ruangan`,
          `id_jenis_ruangan`,
          `kapasitas`,
          `lokasi`
        )
      VALUES
        (
          '" . $data['kode_ruangan'] . "',
          '" . $data['id_jenis_ruangan'] . "',
          '" . $kapasitas . "',
          '" . $data['lokasi'] . "'
        )";
        // $data['kapasitas']
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
      $kapasitas = $data['kapasitas'];
      if($kapasitas==""){
        $kapasitas=0;
      }
      $sql = "UPDATE `ruangan`
              SET `kode_ruangan` = '".$data['kode_ruangan']."',
                  `id_jenis_ruangan` = '".$data['id_jenis_ruangan']."',
                  `kapasitas` = '".$data['kapasitas']."',
                  `lokasi` = '".$data['lokasi']."'
              WHERE id_ruangan = ".$data['id_ruangan']."";

      $status = $this->db->query($sql);

      return $status;
    }

    public function getDataById($id)
    {
        $sql = "SELECT
        r.*,
        jr.nama AS nama_jenis_ruangan
      FROM
        ruangan r
        JOIN jenis_ruangan jr ON jr.id_jenis_ruangan = r.id_jenis_ruangan
        WHERE r.id_ruangan = " . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }

    public function hapusData($id_ruangan){
      $sql = "DELETE FROM ruangan WHERE id_ruangan=".$id_ruangan."";
      $res = $this->db->query($sql);
      return $res;
    }
}
