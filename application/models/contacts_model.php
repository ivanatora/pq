<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacts_model extends CI_Model {
    protected $table = 'contacts';
 
    public function insert($aData){
        $this->db->insert($this->table, $aData);
    }
}