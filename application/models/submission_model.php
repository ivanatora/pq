<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submission_model extends CI_Model {
    private $table = 'photos';
    
    public function getAll() {
        return $this->db->get($this->table)->result();
    }
    
    public function add($aData) {
        $this->db->insert($this->table, $aData);
    }
    
    public function get($id) {
        // get main part
        $this->db->select('p.*, u.*, qpt.*');
        $this->db->from('photos p');
        $this->db->join('users u', 'u.u_id = p.u_id');
        $this->db->join('quests q', 'p.q_id = q.q_id');
        $this->db->join('quests_possible_topics qpt', 'qpt.qpt_id = q.qpt_id');
        $this->db->where('p_id', $id);
        
        $oPhoto = $this->db->get()->first_row();
       
        /* 
        // get exif
        $this->db->select('*');
        $this->db->from('exif');
        $this->db->where('p_id', $id);
        $oPhoto->exif = $this->db->get()->result();
        */
        
        // get rating
        $this->db->select('AVG(r_rating) as r_rating_average', false);
        $this->db->from('ratings');
        $this->db->where('p_id', $oPhoto->p_id);
        $oPhoto->r_rating_average = (string) $this->db->get()->first_row()->r_rating_average;
        
        // get comments
        $this->db->select('c.*, u.*');
        $this->db->from('comments c');
        $this->db->join('users u', 'c.u_id = u.u_id');
        $this->db->where('c.p_id', $oPhoto->p_id);
        $this->db->order_by('c_date DESC');
        $oPhoto->aComments = $this->db->get()->result();
        
        return $oPhoto;
    }
    
    public function getLatest($iLimit) {
        $this->db->select("*");
        $this->db->from("photos p");
        $this->db->join("users u", 'p.u_id = u.u_id');
        $this->db->order_by('p.p_date DESC');
        $this->db->where('p.p_active', 'Y');
        $this->db->limit($iLimit);
        
        return $this->db->get()->result();
    }
    
    public function edit($id, $aData){
        $this->db->where('p_id', $id);
        $this->db->update($this->table, $aData);
    }
    
    public function delete($id) {
        $this->db->where('p_id', $id);
        $this->db->delete($this->table);
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
    
    public function getByUserAndDate($iUserid, $sDate){
        $this->db->select('p_id');
        $this->db->from('photos');
        $this->db->where('u_id', $iUserid);
        $this->db->where('DATE(p_date)', $sDate);
        $this->db->where('p_active', 'Y');
        
        return $this->db->get()->first_row();
    }
    
    public function updateExif($id, $aExif){
        // get real shutter
        $aParts = explode("/", $aExif['shutter']);
        $sRealShutter = $aParts[0] / $aParts[1];

        $aData = array(
            'p_exif_camera' => $aExif['camera'],
            'p_exif_shutter' => $aExif['shutter'],
            'p_exif_shutter_real' => $sRealShutter,
            'p_exif_iso' => $aExif['iso'],
            'p_exif_aperture' => $aExif['aperture'],
            'p_exif_focal' => $aExif['focal']
        );


        $this->db->where('p_id', $id);
        $this->db->update($this->table, $aData);
        /*
        $this->db->where('p_id', $id);
        $this->db->delete('exif');
        
        foreach ($aExif as $sKey => $sValue){
            if (strstr($sValue, '/')){
                $aParts = explode("/", $sValue);
                $sRawValue = $aParts[0] / $aParts[1];
            }
            else {
                $sRawValue = $sValue;
            }
            $aData = array(
                'p_id' => $id, 
                'e_key' => $sKey, 
                'e_value' => $sValue,
                'e_raw_value' => $sRawValue
            );
            $this->db->insert('exif', $aData);
        }
        */
    }
    
    public function getCount(){
        $this->db->select("COUNT(*) as cnt");
        $oRow = $this->db->get($this->table)->first_row();
        
        return $oRow->cnt;
    }
    
    public function getCountComments(){
        $this->db->select("COUNT(*) as cnt");
        $oRow = $this->db->get('comments')->first_row();
        
        return $oRow->cnt;
    }
}
