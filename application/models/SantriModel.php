<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class SantriModel extends CI_Model
{

    public function getListTabel()
    {
        $sql = "SELECT * FROM santri";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getListTabelJoin()
    {
        $sql2 = "SELECT *
      FROM santri s, pembayaran p, riwayat_status_santri rss, peserta_kelas pk
      WHERE s.`id_santri`=p.`id_santri` AND s.`id_santri`=rss.`id_santri` AND s.`id_santri`=pk.`id_santri`
      ";
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
        $sql = "INSERT INTO
        `santri` (
          `id_calon_santri`,
          `nis`,
          `tanggal_registrasi`,
          `status_verifikasi_registrasi_ulang`
        )
      VALUES
        (
          '" . $data['id_calon_santri'] . "',
          '" . $data['nis'] . "',
          '" . $data['tanggal_registrasi'] . "',
          '" . $data['status_verifikasi_registrasi_ulang'] . "'
        )";
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
        return $status;
    }

    public function updateData($data)
    {
        $sql = "UPDATE `santri`
              SET `id_calon_santri` = '" . $data['id_calon_santri'] . "',
                   `nis` = '" . $data['nis'] . "',
                   `tanggal_registrasi` = '" . $data['tanggal_registrasi'] . "',
                   `status_verifikasi_registrasi_ulang` = '" . $data['status_verifikasi_registrasi_ulang'] . "'
              WHERE `id_santri` = " . $data['id_santri'] . "";

        $status = $this->db->query($sql);

        return $status;
    }

    public function getDataById($id)
    {
        $sql2 = "SELECT *
      FROM
        santri
      WHERE
        id_santri = " . $id . "";
        $res = $this->db->query($sql2);
        return $res->result_array()[0];
    }

    public function hapusData($id_ruangan)
    {
        $sql = "DELETE FROM santri WHERE id_santri=" . $id_ruangan . "";
        $res = $this->db->query($sql);
        return $res;
    }
}
