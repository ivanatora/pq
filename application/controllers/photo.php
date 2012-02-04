<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Photo extends MY_Controller {
    
    public function view($id, $sType = 'full'){
        $this->load->model('gallery_model');
        
        $oPhoto = $this->gallery_model->get($id);
        switch ($sType){
            case 'preview': $sContents = $oPhoto->p_preview; break;
            case 'thumb': $sContents = $oPhoto->p_thumb; break;
            default: $sContents = $oPhoto->p_contents; break;
        }
        
        header('Content-type: ' . $oPhoto->p_mime_type);
        echo $sContents;
        exit();
    }
}