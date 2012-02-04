<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->model('member_model');
        
        $this->data = array();
        $this->data['member_id'] = 0;
        if ($this->session->userdata('member_id') != ''){
            $iMemberId = $this->session->userdata('member_id');
            $this->data['member_id'] = $iMemberId;
            $this->data['member'] = $this->member_model->get($iMemberId);
        }
    }
}