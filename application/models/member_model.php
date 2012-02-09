<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {
    private $table = 'users';
    
    public function get($id){
        $this->db->where('u_id', $id);
        $oResult = $this->db->get($this->table)->first_row();
        
        return $oResult;
    }
    
    public function add($sUsername, $sEmail, $sPassword){
        $aData = array(
            'u_username' => $sUsername,
            'u_mail' => $sEmail,
            'u_password' => md5($sPassword)
        );
        $this->db->insert($this->table, $aData);
        
        return $this->db->insert_id();
    }
    
    public function getByEmail($sEmail){
        $this->db->where('u_mail', $sEmail);
        $oResult = $this->db->get($this->table)->first_row();
        
        return $oResult;
    }
    
    public function getByUsername($sUsername){
        $this->db->where('u_username', $sUsername);
        $oResult = $this->db->get($this->table)->first_row();
        
        return $oResult;
    }
}