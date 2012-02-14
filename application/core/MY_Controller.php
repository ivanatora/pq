<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->data = array();
        $this->data['iMemberId'] = 0;
        $this->member_id = 0;
        
        if ($this->session->userdata('member_id') != ''){
            $iMemberId = $this->session->userdata('member_id');
            $this->member_id = $iMemberId;
            $this->data['iMemberId'] = $iMemberId;
            $this->data['oMember'] = $this->member_model->get($iMemberId);
            $this->data['oSettings'] = $this->member_model->getSettings($iMemberId);
        }
        if ($this->input->post('hash')){
            $oUser = $this->member_model->getByHash($this->input->post('hash'));
            if (!empty($oUser)){
                $this->data['iMemberId'] = $oUser->u_id;
                $this->member_id = $oUser->u_id;
                $this->data['oMember'] = $oUser;
                $this->data['oSettings'] = $this->member_model->getSettings($oUser->u_id);
                
                //$this->member_model->destroyHash($this->member_id);
            }
        }
        
        
        // header stuff
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
    
    public function secure() {
        if ($this->member_id == 0){
            redirect(site_url().'member/login');
        }
    }
}