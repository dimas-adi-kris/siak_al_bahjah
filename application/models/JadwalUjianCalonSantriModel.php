<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class JadwalUjianSantriModel extends CI_Model
{

  public function getJadwalUjianSantri()
  {
    $sql = "SELECT * FROM jadwal_ujian_calon_santri";
    $res = $this->db->query($sql);
    return $res->result_array();
  }

  public function tambahJadwalUjianSantri($data)
  {
    $sql = "INSERT INTO
        `jadwal_ujian_calon_santri` (
          `id_calon_santri`,
          `id_jadwal_ujian`,
          `status_persetujuan`,
          `tanggal_setuju`
        )
      VALUES
        (
          '" . $data['id_calon_santri'] . "',
          '" . $data['id_jadwal_ujian'] . "',
          '" . $data['status_persetujuan'] . "',
          '" . $data['tanggal_persetujuan'] . "'
        )";
    $status = $this->db->query($sql);

    return $status;
  }

  public function hapusJadwalUjianSantri($id)
  {
    $sql = "DELETE FROM jadwal_ujian_calon_santri WHERE id_jadwal_ujian_calon_santri=" . $id . "";
    $res = $this->db->query($sql);
    return $res;
  }

  public function getJadwalUjianSantriById($id)
  {
    $sql = "SELECT
        *
      FROM
        jadwal_ujian_calon_santri
        WHERE id_jadwal_ujian_calon_santri = " . $id . "";
    $res = $this->db->query($sql);
    return $res->result_array()[0];
  }

  public function updateJadwalUjianSantri($data)
  {
    $sql = "UPDATE jadwal_ujian_calon_santri
    SET
    id_calon_santri= '" . $data['id_calon_santri_ubah'] . "',
    id_jadwal_ujian= '" . $data['id_jadwal_ujian_ubah'] . "',
    status_persetujuan= '" . $data['status_persetujuan_ubah'] . "',
    tanggal_setuju= '" . $data['tanggal_persetujuan_ubah'] . "'
    WHERE id_jadwal_ujian_calon_santri=" . $data['id_jadwal_ujian_calon_santri_ubah'] . "";
    $status = $this->db->query($sql);
    return $status;
  }

  public function updateData($data)
  {
    $kapasitas = $data['kapasitas_ruang'];
    if ($kapasitas == "") {
      $kapasitas = 0;
    }

    $sql = "UPDATE ruangan
    SET kode_ruangan= '" . $data['kode_ruang'] . "',
    id_jenis_ruangan= '" . $data['id_jenis_ruangan'] . "',
    kapaitas= '" . $data['kapasitas_ruang'] . "',
    lokasi= '" . $data['lokasi_ruang'] . "'
    WHERE id_ruangan=" . $data['id_ru'] . "";
    $status = $this->db->query($sql);
    return $status;
  }
}
