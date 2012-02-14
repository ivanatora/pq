<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends MY_Controller {

    public function index() {
        $this->load->view('include/header', $this->data);
        $this->load->view('faq/index', $this->data);
		$this->load->view('include/footer', $this->data);
    }
}