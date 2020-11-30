<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class HasilKelulusanModel extends CI_Model
{

  public function getHasilKelulusan()
  {
    $sql = "SELECT * FROM hasil_kelulusan";
    $res = $this->db->query($sql);
    return $res->result_array();
  }

  public function tambahHasilKelulusan($data)
  {
    $sql = "INSERT INTO
        `hasil_kelulusan` (
          `id_calon_santri`,
          `tanggal_kelulusan`,
          `status_lulus`,
          `keterangan`
        )
      VALUES
        (
          '" . $data['id_calon_santri'] . "',
          '" . $data['tanggal_kelulusan'] . "',
          '" . $data['status_lulus'] . "',
          '" . $data['keterangan'] . "'
        )";
    $status = $this->db->query($sql);

    return $status;
  }

  public function hapusHasilKelulusan($id)
  {
    $sql = "DELETE FROM hasil_kelulusan WHERE id_hasil_kelulusan=" . $id . "";
    $res = $this->db->query($sql);
    return $res;
  }

  public function getHasilKelulusanById($id)
  {
    $sql = "SELECT
        *
      FROM
        hasil_kelulusan
        WHERE id_hasil_kelulusan = " . $id . "";
    $res = $this->db->query($sql);
    return $res->result_array()[0];
  }

  public function updateHasilKelulusan($data)
  {
    $sql = "UPDATE hasil_kelulusan
    SET
    id_calon_santri= '" . $data['id_calon_santri_ubah'] . "',
    tanggal_kelulusan= '" . $data['tanggal_kelulusan_ubah'] . "',
    status_lulus= '" . $data['status_lulus_ubah'] . "',
    keterangan= '" . $data['keterangan_ubah'] . "'
    WHERE id_hasil_kelulusan=" . $data['id_hasil_kelulusan_ubah'] . "";
    $status = $this->db->query($sql);
    return $status;
  }
}
