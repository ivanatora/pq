<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rss extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('quest_model');
        $this->load->model('submission_model');
        
    }
    
    public function quests() {
        $aData = array(
            'sFeedName' => 'Latest quests at PhotoQuest',
            'sChannelDescription' => 'Always get the current quest!',
            'sFeedUrl' => site_url() . 'rss/quests',
            'aItems' => array()
        );
        $aQuests = $this->quest_model->getLatest(10);
        foreach ($aQuests as $oQuest){
            $aData['aItems'][] = array(
                'sTitle' => $oQuest->qpt_topic,
                'sDescription' => 'Letter: ' . $oQuest->qpt_letter . ' topic: ' . $oQuest->qpt_topic,
                'sLink' => site_url() . 'gallery/view/quest-' . $oQuest->qpt_topic . '-' . $oQuest->q_id
            );
        }
        
        header("Content-Type: application/rss+xml");
        
        $this->load->view('rss/rss', $aData);
    }
    
    public function photos() {
        $aData = array(
            'sFeedName' => 'Latest photos at PhotoQuest',
            'sChannelDescription' => 'Always get the latest submission!',
            'sFeedUrl' => site_url() . 'rss/quests',
            'aItems' => array()
        );
        $aPhotos = $this->submission_model->getLatest(10);
        foreach ($aPhotos as $oPhoto){
            $sUrlizedName = preg_replace('/[^\w\s\d]/', '', $oPhoto->p_name);
            $aData['aItems'][] = array(
                'sTitle' => $oPhoto->p_name,
                'sDescription' => "'" . $oPhoto->p_name . "' by " . $oPhoto->u_username,
                'sLink' => site_url() . 'submission/view/'.$sUrlizedName .'/' . $oPhoto->p_id
            );
        }
        
        header("Content-Type: application/rss+xml");
        
        $this->load->view('rss/rss', $aData);
    }
}