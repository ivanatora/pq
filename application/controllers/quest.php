<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quest extends MY_Controller {
    
    public function ajax_suggest() {
        if ($this->input->post()){
            $sTopic = $this->input->post('topic');
            
            $this->load->model('quest_model');
            $this->quest_model->suggest($sTopic);
            
            $this->load->library('email');
            $this->email->from('ivanatora@gmail.com');
            $this->email->to('ivanatora@gmail.com');
            $this->email->subject("Topic suggestion");
            $this->email->message("Topic suggested: $sTopic");
            $this->email->send();
            
            echo json_encode(array('success' => true));
            exit();
        }
    }
}