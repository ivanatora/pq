<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('quest_model');
        
        $sTodayYmd = date("Y-m-d");
        $sTomorrowYmd = date("Y-m-d", strtotime("+1 day"));
        $sTodayDmy = date("d.m.Y");
        $iDayOfMonth = date("d");
        
        $this->data['iDayOfMonth'] = $iDayOfMonth;
        
        $oCurrentQuest = $this->quest_model->getQuestForDate($sTodayYmd);
        if (!empty($oCurrentQuest)){
            $this->data['sTodayQuest'] = $oCurrentQuest->qpt_topic;
            $this->data['sTodayLetter'] = $oCurrentQuest->qpt_topic[0]; //chr(64 + $iDayOfMonth);
        }
        else {
            $this->data['sTodayQuest'] = '';
            $this->data['sTodayLetter'] = '';
        }
        $oTomorrowQuest = $this->quest_model->getQuestForDate($sTomorrowYmd);
        if (!empty($oTomorrowQuest)){
            $this->data['sTomorrowQuest'] = $oTomorrowQuest->qpt_topic;
        }
    }
	public function index()
	{
        $this->view();
	}
    
    public function view() {
        $this->load->view('include/header', $this->data);
		$this->load->view('include/footer', $this->data);
    }
}


?>