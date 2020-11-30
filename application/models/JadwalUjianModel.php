<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class JadwalUjianModel extends CI_Model
{

  public function getJadwalUjian()
  {
    $sql = "SELECT * FROM jadwal_ujian";
    $res = $this->db->query($sql);
    return $res->result_array();
  }

  public function tambahJadwalUjian($data)
  {
    $sql = "INSERT INTO
        `jadwal_ujian` (
          `tanggal`,
          `waktu`,
          `lokasi`,
          `keterangan`
        )
      VALUES
        (
          '" . $data['tanggal'] . "',
          '" . $data['waktu'] . "',
          '" . $data['lokasi'] . "',
          '" . $data['keterangan'] . "'
        )";
    $status = $this->db->query($sql);

    return $status;
  }

  public function hapusJadwalUjian($id)
  {
    $sql = "DELETE FROM jadwal_ujian WHERE id_jadwal_ujian=" . $id . "";
    $res = $this->db->query($sql);
    return $res;
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

  public function getJadwalUjianById($id)
  {
    $sql = "SELECT
        *
      FROM
        jadwal_ujian
        WHERE id_jadwal_ujian = " . $id . "";
    $res = $this->db->query($sql);
    return $res->result_array()[0];
  }

  public function updateJadwalUjian($data)
  {
    $sql = "UPDATE jadwal_ujian
    SET
    tanggal= '" . $data['tanggal-ubah'] . "',
    waktu= '" . $data['waktu-ubah'] . "',
    lokasi= '" . $data['lokasi-ubah'] . "',
    keterangan= '" . $data['keterangan-ubah'] . "'
    WHERE id_jadwal_ujian=" . $data['id-jadwal-ujian-ubah'] . "";
    $status = $this->db->query($sql);
    return $status;
  }
}
