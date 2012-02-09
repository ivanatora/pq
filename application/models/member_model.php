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
    
    public function getSettings($iUserId) {
        $this->db->where('u_id', $iUserId);
        $aRows = $this->db->get('settings')->result();
        
        $oResult = new stdClass;
        foreach ($aRows as $oRow){
            $sKey = $oRow->s_key;
            $sValue = $oRow->s_value;
            $oResult->$sKey = $sValue;
        }
        
        return $oResult;
    }
    
    public function saveSettings($aData, $iUserId){
        $this->db->where('u_id', $iUserId);
        $this->db->delete('settings');
        
        foreach ($aData as $sKey => $sValue){
            $aInsertData = array(
                's_key' => $sKey, 
                's_value' => $sValue,
                'u_id' => $iUserId
            );
            $this->db->insert('settings', $aInsertData);
        }
    }
}