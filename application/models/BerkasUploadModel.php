<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class BerkasUploadModel extends CI_Model
{

  public function uploadFile()
  {
    $data['calon_santri'] = $this->db->get_where('calon_santri', ['email' => $this->session->userdata('email')])->row_array();
    $config['upload_path']          = './upload/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->product_id;
    $config['overwrite']		      	= true;
    $config['max_size']             = 102400; // 1MB

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg"; 
  }

  public function getListTabel()
  {
      $sql = "SELECT * FROM berkas_upload";
      $res = $this->db->query($sql);
      return $res->result_array();
  }

  public function insertData($data)
  {
    $sql = "INSERT INTO
    `berkas_upload` (
      `id_berkas_upload`,
      `id_calon_santri`,
      `tanggal_upload`,
      `nama_berkas`,
      `lokasi_upload`,
      `keterangan`
    )
  VALUES
    (
      '" . $data['id_berkas_upload'] . "',
      '" . $data['id_calon_santri'] . "',
      '" . $data['tanggal_upload'] . "',
      '" . $data['nama_berkas'] . "',
      '" . $data['lokasi_upload'] . "',
      '" . $data['keterangan'] . "'
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

  public function updateData($data)
  {
    $sql = "UPDATE `berkas_upload`
            SET
                `id_calon_santri` = '".$data['id_calon_santri']."',
                `tanggal_upload` = '".$data['tanggal_upload']."',
                `nama_berkas` = '".$data['nama_berkas']."',
                `lokasi_upload` = '".$data['lokasi_upload']."',
                `keterangan` = '".$data['keterangan']."'
            WHERE id_berkas_upload = ".$data['id_berkas_upload']."";

    $status = $this->db->query($sql);

    return $status;
  }


  public function getDataById($id)
  {
      $sql2 = "SELECT * 
    FROM 
      berkas_upload 
    WHERE 
      id_berkas_upload = ".$id."";
    $res = $this->db->query($sql2);
    // print_r( $res->result_array()[0]);
    return $res->result_array()[0];
  }

  public function hapusData($id_ruangan){
    $sql = "DELETE FROM berkas_upload WHERE id_berkas_upload=".$id_ruangan."";
    $res = $this->db->query($sql);
    return $res;
  }
}
