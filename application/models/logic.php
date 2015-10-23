<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Logic extends CI_Model
{
    public function global_insert($table_name, $data, $where=NULL)
    {
        $this->db->insert($table_name, $data);
        return mysql_insert_id();
    }
    public function global_get($table_name, $where = NULL)
    {
        if($where !== NULL)
        {
        $this->db->where($where);
        }
        $get_data = $this->db->get($table_name);
        return $get_data;
    }
}