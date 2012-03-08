<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {
    
    public function index() {
        $contact_success = false;
        if ($this->input->post('submit_btn')){
            $this->load->library('email');
            $this->load->model('contacts_model');
            
            
            $aData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'content' => $this->input->post('message'),
                'ip' => $this->input->ip_address()
            );
            $this->contacts_model->insert($aData);
            
            
            $sSubject = "New message from PhotoQuest";
            $sMessage = "<html><head></head><body>
              Name: {$aData['name']}<br />
              Email: {$aData['email']}<br />
              Content: {$aData['content']}<br />
              IP address: {$aData['ip']}<br />
</body></html>";
            
            $this->email->initialize(array(
                'mailtype' => 'html'
            ));
            $this->email->from('pq@dev.ivanatora.info');
            $this->email->to('ivanatora@gmail.com');
            $this->email->subject($sSubject);
            $this->email->message($sMessage);
            $this->email->send();
            $contact_success = true;
        }
        $this->data['contact_success'] = $contact_success;
        
        $this->load->view('include/header', $this->data);
        $this->load->view('contact/index', $this->data);
		$this->load->view('include/footer', $this->data);
    }
}