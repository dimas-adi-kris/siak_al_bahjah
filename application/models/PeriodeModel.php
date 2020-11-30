<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class PeriodeModel extends CI_Model
{

  public function getPeriode()
  {
    $sql = "SELECT * FROM periode";
    $res = $this->db->query($sql);
    return $res->result_array();
  }

  public function getProgram()
  {
    $sql = "SELECT * FROM program";
    $res = $this->db->query($sql);
    return $res->result_array();
  }

  public function getListProgram()
  {
    $sql = "SELECT
        r.*,
        jr.nama
      FROM
        periode r
        JOIN program jr ON jr.id_program = r.id_program
      ";
    $res = $this->db->query($sql);
    return $res->result_array();
  }

  public function tambahPeriode($data)
  {
    $sql = "INSERT INTO
        `periode` (
          `id_program`,
          `tanggal_buka`,
          `tanggal_tutup`,
          `tahun_ajaran_masehi`,
          `tahun_ajaran_hijriyah`
        )
      VALUES
        (
          '" . $data['id_program'] . "',
          '" . $data['tanggal_buka'] . "',
          '" . $data['tanggal_tutup'] . "',
          '" . $data['tahun_ajaran_masehi'] . "',
          '" . $data['tahun_ajaran_hijriyah'] . "'
        )";
    $status = $this->db->query($sql);

    return $status;
  }

  public function hapusPeriode($id)
  {
    $sql = "DELETE FROM periode WHERE id_periode=" . $id . "";
    $res = $this->db->query($sql);
    return $res;
  }

  public function getPeriodeById($id)
  {
    $sql = "SELECT
        *
      FROM
        periode
        WHERE id_periode = " . $id . "";
    $res = $this->db->query($sql);
    return $res->result_array()[0];
  }

  public function updatePeriode($data)
  {
    $sql = "UPDATE periode
    SET
    id_program= '" . $data['id_program_ubah'] . "',
    tanggal_buka= '" . $data['tanggal_buka_ubah'] . "',
    tanggal_tutup= '" . $data['tanggal_tutup_ubah'] . "',
    tahun_ajaran_masehi= '" . $data['tahun_ajaran_masehi_ubah'] . "',
    tahun_ajaran_hijriyah= '" . $data['tahun_ajaran_hijriyah_ubah'] . "'
    WHERE id_periode=" . $data['id_periode_ubah'] . "";
    $status = $this->db->query($sql);
    return $status;
  }
}
