<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model {
    protected $table = 'photos';
    
    public function get($id){
        $this->db->from($this->table);
        $this->db->where('p_id', $id);
        return $this->db->get()->first_row();
    }
    
    public function getPage($iUserId = 0, $iQuestId = 0, $iStart = 0, $iLimit = 10, 
            $aWhere = array()){
        $this->db->select("COUNT(*) as cnt");
        $this->db->from("photos p");
        $this->db->join("users u", "p.u_id = u.u_id");
        $this->db->where('p_active', 'Y');
        
        if ($iUserId){
            $this->db->where('u.u_id', $iUserId);
        }
        if ($iQuestId){
            $this->db->where('p.q_id', $iQuestId);
        }
        
        if (!empty($aWhere)){
            $this->db->where($aWhere);
        }

        
        $oResult = $this->db->get()->first_row();
        //lm("QUERY HERE: " . $this->db->last_query());
        //$iCount = count($aResult);
        $iCount = $oResult->cnt;
        
        
        $this->db->select("p.*, u_username, u.u_id");
        $this->db->from("photos p");
        $this->db->join("users u", "p.u_id = u.u_id");
        $this->db->where('p_active', 'Y');
        
        if ($iUserId){
            $this->db->where('u.u_id', $iUserId);
        }
        if ($iQuestId){
            $this->db->where('p.q_id', $iQuestId);
        }
        if (!empty($aWhere)){
            $this->db->where($aWhere);
        }
        
        
        $this->db->order_by('p_date', 'desc');
        $this->db->limit($iLimit, $iStart);
        $aResults = $this->db->get()->result();
        //lm("QUERY THERE: " . $this->db->last_query());
        
        return array(
            'count' => $iCount,
            'data' => $aResults
        );
    }
    
}
