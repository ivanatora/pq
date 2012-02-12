<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Convert_old_images extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    
	public function index() {
        print "Disabled for now\n";
        exit();
        $aRes = $this->db->query("SELECT * FROM photos WHERE p_active = 'N'", false)->result();
        
        foreach ($aRes as $oRow){
            $id = $oRow->p_id;
            $sNewFilename = md5($id .time());
            // getcwd() = /opt/projects/pq2
            mkdir('media/storage/submissions/'.$id);
            
            $fp = fopen('media/storage/submissions/'.$id.'/' . $sNewFilename . '.jpg', 'wb');
            fputs($fp, $oRow->p_contents);
            fclose($fp);
            
            $fp = fopen('media/storage/submissions/'.$id.'/' . $sNewFilename . '_preview.jpg', 'wb');
            fputs($fp, $oRow->p_preview);
            fclose($fp);
            
            $fp = fopen('media/storage/submissions/'.$id.'/' . $sNewFilename . '_thumb.jpg', 'wb');
            fputs($fp, $oRow->p_thumb);
            fclose($fp);
            
            $this->db->where('p_id', $id);
            $this->db->update('photos', array(
                'p_image' => $sNewFilename,
                'p_active' => 'Y'
            ));
        }
    }
    
    public function test_utf8(){
        $this->db->simple_query('SET NAMES utf8');  
        $aRes = $this->db->query("SELECT * FROM comments", false)->result();
        print_r($aRes);
    }
    
    public function test_insert() {
        $this->db->insert('comments', array(
            'c_text' => 'Аллаллала баллала'
        ));
    }
    
    public function import_comments() {
        $sCommentsFile = "/opt/projects/pq/tools/comment_export.txt";
        $sImportStr = file_get_contents($sCommentsFile);
        $aRes = unserialize($sImportStr);
        print_r($aRes);
        
        $this->db->query("TRUNCATE comments");
        $this->db->insert_batch('comments', $aRes);
    }
}


?>