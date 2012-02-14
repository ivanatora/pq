<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tools extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        if ($this->input->is_cli_request() == false){
            lm("NOT CLI");
            exit();
        }
    }
    
	public function extract_photos() {
        $aRes = $this->db->query("SELECT * FROM photos WHERE p_active = 'N'", false)->result();
        
        foreach ($aRes as $oRow){
            $id = $oRow->p_id;
            $sNewFilename = md5($id .time());
            // getcwd() = /opt/projects/pq2
            mkdir('media/storage/submissions/'.$id);
            
            $fp = fopen('media/storage/submissions/'.$id.'/' . $sNewFilename . '.jpg', 'wb');
            fputs($fp, $oRow->p_contents);
            fclose($fp);
            
            $fp = fopen('media/storage/submissions/'.$id.'/' . $sNewFilename . '_preview.jpg', 'wb');
            fputs($fp, $oRow->p_preview);
            fclose($fp);
            
            $fp = fopen('media/storage/submissions/'.$id.'/' . $sNewFilename . '_thumb.jpg', 'wb');
            fputs($fp, $oRow->p_thumb);
            fclose($fp);
            
            $this->db->where('p_id', $id);
            $this->db->update('photos', array(
                'p_image' => $sNewFilename,
                'p_active' => 'Y'
            ));
        }
    }
    
    public function test_utf8(){
        $this->db->simple_query('SET NAMES utf8');  
        $aRes = $this->db->query("SELECT * FROM comments", false)->result();
        print_r($aRes);
    }
    
    public function test_insert() {
        $this->db->insert('comments', array(
            'c_text' => 'Аллаллала баллала'
        ));
    }
    
    public function import_comments() {
        $sCommentsFile = "/opt/projects/pq/tools/comment_export.txt";
        $sImportStr = file_get_contents($sCommentsFile);
        $aRes = unserialize($sImportStr);
        print_r($aRes);
        
        $this->db->query("TRUNCATE comments");
        $this->db->insert_batch('comments', $aRes);
    }
    
    public function select_daily_topic($sDate = 'today'){
        if (!preg_match('/\d{4}-\d{2}-\d{2}/', $sDate)) {
            if ($sDate == 'today') {
                $sDate = date("Y-m-d");
            }
            if ($sDate == 'tomorrow') {
                $sDate = date("Y-m-d", strtotime("+1 day"));
            }
        } 
        
        $this->load->model('quest_model');
        $oQuest = $this->quest_model->getQuestForDate($sDate);
        if (!empty($oQuest)){
            print "Old quest selected for $sDate = {$oQuest->q_id} - {$oQuest->qpt_topic}\n";

            if ($oQuest->q_id) exit();
        }
        
        $iTodayDay = date("d", strtotime($sDate));
        $cTodayLetter = chr(64 + $iTodayDay);
        $cTodayLetter = strtolower($cTodayLetter);
        
        $oPossibleTopic = $this->quest_model->getPossibleTopicByLetter($cTodayLetter);
        if (empty($oPossibleTopic)){
            $oPossibleTopic = $this->quest_model->getPossibleTopicByLetter();
        }
        $iSelectedId = $oPossibleTopic->qpt_id;
        
        print "Selected topic: $iSelectedId -> " . $oPossibleTopic->qpt_topic . "\n";
        
        $this->quest_model->select($iSelectedId, $sDate);
        
        // email notification
        if ($sDate != date("Y-m-d")) exit();
        
        $sToday = date("d.m.Y");
        $sMessage = "Topic selected for $sToday is '" . $oPossibleTopic->qpt_topic . "'";
        $sSubject = 'New topic on PhotoQuest';
        
        $this->load->library('email');
        
        
        $aUsers = $this->member_model->getUsersBySetting('notify_new_topics', 1);
        foreach ($aUsers as $oReciever){
            $this->email->to($oReciever->u_mail);
            $this->email->subject($sSubject);
            $this->email->message($sMessage);
            $this->email->send();

        }
    }
}


?>