<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    
	public function login(){
        if ($this->input->post()){
            $sEmail = $this->input->post('email');
            $sPassword = trim($this->input->post('password'));
            
            $oUser = $this->member_model->getByEmail($sEmail);
            if (empty($oUser)){
                $this->data['error'] = 'Unknown user';
                $this->_display_login();
                return;
            }
            
            if (md5($sPassword) != $oUser->u_password){
                $this->data['error'] = 'Invalid password';
                $this->_display_login();
                return;
            }
            
            $this->session->set_userdata('member_id', $oUser->u_id);
            redirect(site_url());
        }
        
        $this->_display_login();
    }
    
    protected function _display_login(){
        $this->load->view('include/header', $this->data);
        $this->load->view('member/login', $this->data);
		$this->load->view('include/footer', $this->data);
    }
    
    public function register() {
        if ($this->input->post()){
            $sUsername = $this->input->post('username', true);
            $sEmail = $this->input->post('email');
            $sPassword = $this->input->post('password');
            $sConfirmPassword = $this->input->post('confirm_password');
            
            $sUsername = htmlspecialchars($sUsername);
            
            $oUser = $this->member_model->getByEmail($sEmail);
            if (!empty($oUser)){
                $this->data['error'] = 'This email is already registered.';
                $this->_display_register();
                return;
            }
            $oUser = $this->member_model->getByUsername($sUsername);
            if (!empty($oUser)){
                $this->data['error'] = 'This username is already taken.';
                $this->_display_register();
                return;
            }
            
            if ($sPassword != $sConfirmPassword){
                $this->data['error'] = 'Confirm password doesn\'t match.';
                $this->_display_register();
                return;
            }
            
            // everything is ok
            $iNewUserId = $this->member_model->add($sUsername, $sEmail, $sPassword);
            $this->data['success'] = true;
        }
        
        $this->_display_register();
    }
    
    protected function _display_register() {
        $this->load->view('include/header', $this->data);
        $this->load->view('member/register', $this->data);
		$this->load->view('include/footer', $this->data);
    }
    
    public function logout() {
        $this->session->unset_userdata('member_id');
        redirect(site_url());
    }
    
    public function settings() {
        $this->secure();
        
        if ($this->input->post()){
            $aNewSettings = array();
            foreach ($this->input->post() as $sKey => $sValue){
                if ($sValue == 'on') $sValue = 1;
                $aNewSettings[$sKey] = $sValue;
            }
            $this->member_model->saveSettings($aNewSettings, $this->member_id);
            $this->data['success'] = true;
            $this->data['oSettings'] = $this->member_model->getSettings($this->member_id);
        }
        
        $this->_display_settings();
    }
    
    protected function _display_settings() {
        $this->load->view('include/header', $this->data);
        $this->load->view('member/settings', $this->data);
		$this->load->view('include/footer', $this->data);
    }
    
    public function list_all() {
        $this->data['aUsers'] = $this->member_model->getAll();
        lm($this->db->last_query());
        
        $this->load->view('include/header', $this->data);
        $this->load->view('member/list_all', $this->data);
		$this->load->view('include/footer', $this->data);
    }
}


?>