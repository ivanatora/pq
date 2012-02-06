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
    
    public function view($sType = 'default', $iStart = 0) {
        $this->load->model('gallery_model');
        $this->load->model('quest_model');
        
        $iLimit = NUM_PICS_ROWS_PER_PAGE * NUM_PICS_COLS_PER_PAGE;
        
        $aResults = $this->gallery_model->getPage(0, 0, $iStart, $iLimit);
        
        foreach ($aResults['data'] as $iKey => $oRow){
            $oQuest = $this->quest_model->get($oRow->q_id);
            $aResults['data'][$iKey]->q_id = $oQuest->q_id;
            $aResults['data'][$iKey]->qpt_topic = $oQuest->qpt_topic;
        }
        $this->data['aResults'] = $aResults['data'];
        
        $this->load->library('pagination');
        $config['base_url'] = site_url() . '/gallery/view/' . $sType;
        $config['uri_segment'] = 4;
        $config['num_links'] = 4;
        $config['total_rows'] = $aResults['count'];
        $config['per_page'] = $iLimit;
        $config['anchor_class'] = 'class="link_gallery_page" ';
        $config['cur_tag_open'] = '<a class="link_gallery_page current_page">';
        $config['cur_tag_close'] = '</a>';
        $config['first_tag_open'] = '<span>';
        $config['first_link'] = 'First';
        $config['first_tag_close'] = '</span>';
        $config['last_tag_open'] = '<span>';
        $config['last_link'] = 'Last';
        $config['last_tag_close'] = '</span>';
        $config['next_tag_open'] = '<span class="noborder">';
        $config['next_tag_close'] = '</span>';
        $config['prev_tag_open'] = '<span class="noborder">';
        $config['prev_tag_close'] = '</span>';
        $this->pagination->initialize($config);
        
        
        $this->load->view('include/header', $this->data);
        $this->load->view('gallery/view', $this->data);
		$this->load->view('include/footer', $this->data);
    }
}


?>