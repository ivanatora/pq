<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Controller {
    
    protected $aSearchParams = array();

    public function __construct() {
        parent::__construct();
    }
	public function index()
	{
        $this->view();
	}
    
    public function view($sType = 'all', $iStart = 0) {
        $this->load->model('gallery_model');
        $this->load->model('quest_model');
        
        $iLimit = NUM_PICS_ROWS_PER_PAGE * NUM_PICS_COLS_PER_PAGE;
        
        $aWhere = array();
        $aExifSearch = array();
        if (preg_match('/quest-(\w+)-(\d+?)$/', $sType, $aMatches)){
            $aWhere['q_id'] = $aMatches[2];
            $this->data['sGalleryType'] = 'quest';
            $this->data['sGalleryTitle'] = $aMatches[1];
        }
        if (preg_match('/user-(\w+)-(\d+?)$/', $sType, $aMatches)){
            $aWhere['u.u_id'] = $aMatches[2];
            $this->data['sGalleryType'] = 'user';
            $this->data['sGalleryTitle'] = $aMatches[1];
        }
        if ($sType == 'search'){
            $this->data['sGalleryType'] = 'search';
            $this->data['sGalleryTitle'] = $this->_generateTitleBySearch();
            $aExifSearch = $this->_generateWhereBySearch();
            $aWhere = array_merge($aWhere, $aExifSearch);
        }
        
        
        $aResults = $this->gallery_model->getPage(0, 0, $iStart, $iLimit, 
                $aWhere);
        
        foreach ($aResults['data'] as $iKey => $oRow){
            $oQuest = $this->quest_model->get($oRow->q_id);
            $aResults['data'][$iKey]->q_id = $oQuest->q_id;
            $aResults['data'][$iKey]->qpt_topic = $oQuest->qpt_topic;
            $aResults['data'][$iKey]->p_url = preg_replace('/[^\w\s\d]/', '', $oRow->p_name);
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
    
    public function quests() {
        $sToday = date("Y-m-d");
        $this->data['aQuests'] = $this->quest_model->getOlderThan($sToday);
        
        $this->load->view('include/header', $this->data);
        $this->load->view('gallery/quests', $this->data);
		$this->load->view('include/footer', $this->data);
    }
    
    public function search() {
        if ($this->input->post()){
            $aExifParams = array(
                'min_iso' => $this->input->post('min_iso'),
                'max_iso' => $this->input->post('max_iso'),
                'min_shutter' => $this->input->post('min_shutter'),
                'max_shutter' => $this->input->post('max_shutter'),
                'min_aperture' => $this->input->post('min_aperture'),
                'max_aperture' => $this->input->post('max_aperture'),
                'min_focal' => $this->input->post('min_focal'),
                'max_focal' => $this->input->post('max_focal')
            );
            
            // filter out default values
            if ($aExifParams['min_iso'] == '0'){
                unset($aExifParams['min_iso']);
            }
            if ($aExifParams['max_iso'] == '3200+'){
                unset($aExifParams['max_iso']);
            }
            if ($aExifParams['min_shutter'] == '0'){
                unset($aExifParams['min_shutter']);
            }
            if ($aExifParams['max_shutter'] == '32+'){
                unset($aExifParams['max_shutter']);
            }
            if ($aExifParams['min_aperture'] == '0'){
                unset($aExifParams['min_aperture']);
            }
            if ($aExifParams['max_aperture'] == '32+'){
                unset($aExifParams['max_aperture']);
            }
            if ($aExifParams['min_focal'] == '0'){
                unset($aExifParams['min_focal']);
            }
            if ($aExifParams['max_focal'] == '1000+'){
                unset($aExifParams['max_focal']);
            }
            
            
//            if (strstr($aExifParams['min_shutter'], '/')){
//                $aParts = explode("/", $aExifParams['min_shutter']);
//                $aExifParams['min_shutter'] = $aParts[0] / $aParts[1];
//            }
//            if (strstr($aExifParams['max_shutter'], '/')){
//                $aParts = explode("/", $aExifParams['max_shutter']);
//                $aExifParams['max_shutter'] = $aParts[0] / $aParts[1];
//            }
            //$this->session->set_flashdata('aExifParams', $aExifParams);
            $this->aSearchParams = $aExifParams;
            
            $this->view('search');
            return;
        }
        
        $this->load->view('include/header', $this->data);
        $this->load->view('gallery/search', $this->data);
		$this->load->view('include/footer', $this->data);
    }
    
    protected function _generateTitleBySearch() {
        $sTitle = '';
        $aTitle = array();
        foreach ($this->aSearchParams as $sKey => $sValue){
            $sPureKey = str_replace('min_', '', $sKey);
            $sPureKey = str_replace('max_', '', $sPureKey);
            
            if (!isset($aTitle[$sPureKey])){
                $aTitle[$sPureKey] = $sPureKey;
            }
            
            if (strstr($sKey, 'min_')){
                $aTitle[$sPureKey] = "$sValue < " . $aTitle[$sPureKey];
            }
            if (strstr($sKey, 'max_')){
                $aTitle[$sPureKey] = $aTitle[$sPureKey] . " < $sValue";
            }
        }
        
        return join("; ", array_values($aTitle));
    }
    
    protected function _generateWhereBySearch() {
        $aWhere = array();
        
        foreach ($this->aSearchParams as $sKey => $sValue){
            $sPureKey = str_replace('min_', '', $sKey);
            $sPureKey = str_replace('max_', '', $sPureKey);
            
            if (strstr($sValue, '/')){
                $aParts = explode("/", $sValue);
                $sValue = $aParts[0] / $aParts[1];
            }
            
            if ($sPureKey == 'shutter'){
                $sPureKey = 'shutter_real';
            }
            
            $sColumnName = 'p_exif_' . $sPureKey;
            
            if (strstr($sKey, 'min_')){
                $aWhere[$sColumnName . ' >='] = $sValue;
                $aWhere[$sColumnName . ' <>'] = 0;
            }
            if (strstr($sKey, 'max_')){
                $aWhere[$sColumnName . ' <='] = $sValue;
                $aWhere[$sColumnName . ' <>'] = 0;
            }
        }
        
        lm($aWhere);
        
        return $aWhere;
    }
}


?>