<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tools extends MY_Controller {

    protected function _check_cli(){
        if ($this->input->is_cli_request() == false){
            lm("NOT CLI");
            exit();
        }
    }
    
	public function extract_photos() {
        $this->_check_cli();
        
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
    
    public function import_comments() {
        $this->_check_cli();
        
        $sCommentsFile = "/opt/projects/pq/tools/comment_export.txt";
        $sImportStr = file_get_contents($sCommentsFile);
        $aRes = unserialize($sImportStr);
        print_r($aRes);
        
        $this->db->query("TRUNCATE comments");
        $this->db->insert_batch('comments', $aRes);
    }
    
    public function select_daily_topic($sDate = 'today'){
        $this->_check_cli();
        
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
            $this->email->from('pq@dev.ivanatora.info');
            $this->email->to($oReciever->u_mail);
            $this->email->subject($sSubject);
            $this->email->message($sMessage);
            $this->email->send();

        }
    }

    public function git_post_receive() {
	//lm($_SERVER);
	//lm($_POST);
	l//m(getcwd());
        //chdir("/home/ivanatora/pq2");
        system("git pull");
    }
}


?>
