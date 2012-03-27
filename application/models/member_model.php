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
    
    public function getSetting($iUserId, $sKey, $sDefault = ''){
        $this->db->select('s_value');
        $this->db->from('settings');
        $this->db->where('u_id', $iUserId);
        $this->db->where('s_key', $sKey);
        
        $oResult = $this->db->get()->first_row();
        if (empty ($oResult)){
            return $sDefault;
        }
        
        return (empty($sResult)) ? $sDefault : $sResult;
    }
    
    public function getUsersBySetting($sKey, $sValue){
        $aUsers = array();
        $this->db->select('s.u_id, u.*');
        $this->db->from('settings s');
        $this->db->join('users u', 'u.u_id = s.u_id');
        $this->db->where('s_key', $sKey);
        $this->db->where('s_value', $sValue);
        
        $aResult = $this->db->get()->result();
        foreach ($aResult as $oRow){
            $aUsers[] = $oRow;
        }
        
        return $aUsers;
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
    
    public function makeHash($iUserId){
        $sHash = md5($iUserId . time());
        $this->db->where('u_id', $iUserId);
        $aData = array(
            'u_hash' => $sHash
        );
        $this->db->update($this->table, $aData);
        
        return $sHash;
    }
    
    public function getByHash($sHash){
        $this->db->where('u_hash', $sHash);
        $oResult = $this->db->get($this->table)->first_row();
        
        return $oResult;
    }
    
    public function destroyHash($iUserId){
        $this->db->where('u_id', $iUserId);
        $aData = array('u_hash' => '');
        $this->db->update($this->table, $aData);
    }
    
    public function getAll(){
        $this->db->select('u.*, COUNT(p_name) as num_photos');
        $this->db->from('users u');
        $this->db->join('photos p', 'p.u_id = u.u_id', 'left');
        $this->db->where('p_active', 'Y');
        $this->db->group_by('u.u_id');
        
        return $this->db->get()->result();
    }
    
    public function getCount(){
        $this->db->select("COUNT(*) as cnt");
        $oRow = $this->db->get($this->table)->first_row();
        
        return $oRow->cnt;
    }
}