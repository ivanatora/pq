<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model {
    protected $table = 'photos';
    
    public function get($id){
        $this->db->from($this->table);
        $this->db->where('p_id', $id);
        return $this->db->get()->first_row();
    }
    
    public function getPage($iUserId = 0, $iQuestId = 0, $iStart = 0, $iLimit = 10, 
            $aWhere = array(), $aExifSearch = array()){
        $this->db->select("COUNT(*) as cnt");
        $this->db->from("photos p");
        $this->db->join("users u", "p.u_id = u.u_id");
        $this->db->join("exif e", "e.p_id = p.p_id");
        $this->db->group_by('p.p_id');
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
        
        if (!empty($aExifSearch)){
            $aDifferentKeys = array();
            // something stupid ...
            foreach ($aExifSearch as $sStr){
                preg_match("/e_key = '(.+?)'/", $sStr, $aMatches);
                #lm("M: " . print_r($aMatches, true));
                $aDifferentKeys[$aMatches[1]] = 1;
            }
            
            $sWhereStr = join(" OR ", $aExifSearch);
            $sWhereStr = "($sWhereStr)";
            #lm("ES: " . print_r($aExifSearch, true));
            $this->db->where($sWhereStr, null, false);
            $this->db->having('COUNT(*)', count(array_keys($aDifferentKeys)));
            lm("DK: " , print_r($aDifferentKeys, true));
        }
        
        $aResult = $this->db->get()->result();
        lm("QUERY HERE: " . $this->db->last_query());
        $iCount = count($aResult);
        
        
        $this->db->select("p.*, u_username, u.u_id");
        $this->db->from("photos p");
        $this->db->join("users u", "p.u_id = u.u_id");
        $this->db->join("exif e", "e.p_id = p.p_id");
        $this->db->group_by('p.p_id');
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
        
        if (!empty($aExifSearch)){
            $aDifferentKeys = array();
            // something stupid ...
            foreach ($aExifSearch as $sStr){
                preg_match("/e_key = '(.+?)'/", $sStr, $aMatches);
                $aDifferentKeys[$aMatches[1]] = 1;
            }
            
            $sWhereStr = join(" OR ", $aExifSearch);
            $sWhereStr = "($sWhereStr)";
            $this->db->where($sWhereStr, null, false);
            $this->db->having('COUNT(*)', count(array_keys($aDifferentKeys)));
            lm("DK 2: " , print_r($aDifferentKeys, true));
        }
        
        $this->db->order_by('p_date', 'desc');
        $this->db->limit($iLimit, $iStart);
        $aResults = $this->db->get()->result();
        lm("QUERY THERE: " . $this->db->last_query());
        
        return array(
            'count' => $iCount,
            'data' => $aResults
        );
    }
    
}
