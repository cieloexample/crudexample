<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
    
    
    public function insert_entry($data)
    {   
        $this->load->database();    
        $result = $this->db->insert('entries', $data);
        return $result;
    }
}



