<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submission_model extends CI_Model {
    private $table = 'photos';
    
    public function add($aData) {
        $this->db->insert($this->table, $aData);
    }
    
    public function get($id) {
        $this->db->select('p.*, u.*, qpt.*');
        $this->db->from('photos p');
        $this->db->join('users u', 'u.u_id = p.u_id');
        $this->db->join('quests q', 'p.q_id = q.q_id');
        $this->db->join('quests_possible_topics qpt', 'qpt.qpt_id = q.qpt_id');
        $this->db->where('p_id', $id);
        
        $oPhoto = $this->db->get()->first_row();
        
        $this->db->select('AVG(r_rating) as r_rating_average', false);
        $this->db->from('ratings');
        $this->db->where('p_id', $oPhoto->p_id);
        $oPhoto->r_rating_average = (string) $this->db->get()->first_row()->r_rating_average;
        
        $this->db->select('c.*, u.*');
        $this->db->from('comments c');
        $this->db->join('users u', 'c.u_id = u.u_id');
        $this->db->where('c.p_id', $oPhoto->p_id);
        $this->db->order_by('c_date DESC');
        $oPhoto->aComments = $this->db->get()->result();
        
        return $oPhoto;
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
    
    public function getRatings($id){
        $this->db->select('*');
        $this->db->from('ratings');
        $this->db->where('p_id', $id);
        
        return $this->db->get()->result();
    }
    
    public function addRating($iUserId, $id, $iRating){
        $aData = array(
            'u_id' => $iUserId,
            'p_id' => $id,
            'r_rating' => $iRating
        );
        $this->db->insert('ratings', $aData);
    }
    
    public function addComment($iUserId, $id, $sComment){
        $aData = array(
            'u_id' => $iUserId,
            'p_id' => $id,
            'c_date' => date("Y-m-d H:i:s"),
            'c_text' => $sComment
        );
        $this->db->insert('comments', $aData);
    }
    
    public function getCommenters($id){
        $aUserIds = array();
        $this->db->select('DISTINCT u_id', false);
        $this->db->from('comments');
        $this->db->where('p_id', $id);
        $aRes = $this->db->get()->result();
        foreach ($aRes as $oRow){
            $aUserIds[] = $oRow->u_id;
        }
        
        return $aUserIds;
    }
}