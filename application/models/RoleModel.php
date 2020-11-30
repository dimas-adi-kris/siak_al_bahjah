<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class RoleModel extends CI_Model
{

    public function getListRole()
    {
        $sql = "SELECT * FROM role";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

}
