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
    
    public function logout() {
        $this->session->unset_userdata('member_id');
        redirect(site_url());
    }
    
    protected function _display_login(){
        $this->load->view('include/header', $this->data);
        $this->load->view('member/login', $this->data);
		$this->load->view('include/footer', $this->data);
    }
    
    protected function _display_register() {
        $this->load->view('include/header', $this->data);
        $this->load->view('member/register', $this->data);
		$this->load->view('include/footer', $this->data);
    }
}


?>