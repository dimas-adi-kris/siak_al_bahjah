<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class SantriModel extends CI_Model
{

  public function getSantri()
  {
    $sql = "SELECT * FROM santri";
    $res = $this->db->query($sql);
    return $res->result_array();
  }



  // FUNGSI DIBAWAH INI YANG DIPAKE UNTUK JOIN 3 TABEL
  public function getTabelJoinSantri()
  {
    $sql = "SELECT * 
            FROM `wali_santri` ws, `santri` s, `berkas_upload` bu
            WHERE ws.id_santri = s.id_santri AND ws.id_santri = bu.id_santri
              ";
    
    $res = $this->db->query($sql);
    return $res->result_array();

  }
  // FUNGSI DIATAS INI YANG DIPAKE UNTUK JOIN 3 
  
  
  public function getTabelJoinProgram()
  {
    $sql = "SELECT * 
            FROM santri s, program pr, periode pe
            WHERE s.id_program = pr.id_program and s.id_program = pe.id_program
              ";
    
    $res = $this->db->query($sql);
    return $res->result_array();

  }
    public function tambahSantri($data)
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

    return $status;
  }

  public function hapusSantri($id)
  {
    $sql = "DELETE FROM santri WHERE id_santri=" . $id . "";
    $res = $this->db->query($sql);
    return $res;
  }

  public function getSantriById($id)
  {
    $sql = "SELECT
        *
      FROM
        santri
        WHERE id_santri = " . $id . "";
    $res = $this->db->query($sql);
    return $res->result_array()[0];
  }

  public function updateSantri($data)
  {
    $sql = "UPDATE santri
    SET
    id_calon_santri= '" . $data['id_calon_santri'] . "',
    nis= '" . $data['nis'] . "',
    tanggal_registrasi= '" . $data['tanggal_registrasi'] . "',
    status_verifikasi_registrasi_ulang= '" . $data['status_verifikasi_registrasi_ulang'] . "',
    WHERE id_santri=" . $data['id_santri'] . "";
    $status = $this->db->query($sql);
    return $status;
  }
}
