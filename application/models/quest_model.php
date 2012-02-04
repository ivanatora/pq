<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quest_model extends CI_Model {
    private $table = 'quests';
    
    
    public function getQuestForDate($sDate){
        
        $this->db->select("*");
        $this->db->from("quests q");
        $this->db->join("quests_possible_topics qpt", "q.qpt_id = qpt.qpt_id");
        $this->db->where('q.q_date', $sDate);
        
        return $this->db->get($this->table)->first_row();
    }
    
}