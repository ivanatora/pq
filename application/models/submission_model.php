<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submission_model extends CI_Model {
    private $table = 'photos';
    
    public function add($aData) {
        $this->db->insert($this->table, $aData);
    }
    
    public function get($id) {
        $this->db->select('*');
        $this->db->where('p_id', $id);
        
        return $this->db->get($this->table)->first_row();
    }
    
    public function edit($id, $aData){
        $this->db->where('p_id', $id);
        $this->db->update($this->table, $aData);
    }
    
    public function getSeqId() {
        $this->db->select('id');
        $this->db->from('photos_seq');
        $iOldId = (int) $this->db->get()->first_row()->id;
        
        $iNewId = $iOldId+1;
        if ($iOldId == 0){
            $this->db->insert('photos_seq', array('id' => $iNewId));
        }
        else {
            $this->db->update('photos_seq', array('id' => $iNewId));
        }
        
        return $iNewId;
    }
}