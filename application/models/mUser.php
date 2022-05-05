<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mUser extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('user', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }
}

/* End of file mUser.php */
