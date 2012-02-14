<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quest_model extends CI_Model {
    private $table = 'quests';
    
    
    public function getQuestForDate($sDate){
        
        $this->db->select("*");
        $this->db->from("quests q");
        $this->db->join("quests_possible_topics qpt", "q.qpt_id = qpt.qpt_id");
        $this->db->where('q.q_date', $sDate);

        return $this->db->get()->first_row();
    }
    
    public function get($id){
        $this->db->from("quests q");
        $this->db->join("quests_possible_topics qpt", "q.qpt_id = qpt.qpt_id");
        $this->db->where("q.q_id", $id);
        
        return $this->db->get()->first_row();
    }
    
    public function getCurrentQuest() {
        $sDate = date("Y-m-d");
        return $this->getQuestForDate($sDate);
    }
    
    public function getPossibleTopicByLetter($c = ''){
        $this->db->from('quests_possible_topics');
        $aWhere = array(
            'qpt_approved' => 'Y',
            'qpt_date_selected' => '0000-00-00'
        );
        if (!empty($c)){
            $aWhere['qpt_letter'] = $c;
        }
        $this->db->where($aWhere);
        $this->db->order_by('qpt_id', 'RANDOM');
        $this->db->limit(1);
        
        return $this->db->get()->first_row();
    }
    
    public function select($id, $sDate){
        $aData = array(
            'q_date' => $sDate,
            'qpt_id' => $id
        );
        $this->db->insert('quests', $aData);
        
        $this->db->where('qpt_id', $id);
        $this->db->update('quests_possible_topics', array('qpt_date_selected' => $sDate));
    }
    
    public function getOlderThan($sDate) {
        $this->db->select('qpt.*, q.q_id, COUNT(p_id) as num_photos');
        $this->db->from('quests q');
        $this->db->join("quests_possible_topics qpt", 'q.qpt_id = qpt.qpt_id');
        $this->db->join("photos p", 'p.q_id = q.q_id', 'left');
        $this->db->where('q.q_date < ', $sDate);
        $this->db->group_by('qpt_id');
        $this->db->order_by('q.q_date DESC');
        
        return $this->db->get()->result();
    }
    
    public function suggest($sTopic){
        $c = $sTopic[0];
        $aData = array(
            'qpt_topic' => $sTopic,
            'qpt_letter' => $c
        );
        $this->db->insert('quests_possible_topics', $aData);
    }
    
}