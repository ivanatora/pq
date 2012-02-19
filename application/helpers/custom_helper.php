<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function lm($str, $var_dump = false) {

    $sShortDate = date('Y-m-d');
    $sFilename = "application/logs/$sShortDate";
    $date = date("d/m/Y H:i:s");
    $sOut = "========================= $date ========================= \n";
    $sOut .= "LINE: " . xdebug_call_line() . "\n";
    $sOut .= "FROM: " . xdebug_call_file(). "\n";
    $sOut .= "FUNC: ". xdebug_call_function() . "\n";
    $sOut .= "POST: " . print_r($_POST, true) . "\n";
    $sOut .= "******************************************************** \n";
    
    if ($var_dump){
        $sOut .= var_export($str, true);
    }
    else {
        if (is_array($str)){
            $sOut .= print_r($str, true);
        }
        elseif (is_object($str)){
            $sOut .= print_r($str, true);
        }
        else {
            $sOut .= ">> $str\n";
        }
    }
    //$sOut = print_r(debug_backtrace(), true);
    $aStack = xdebug_get_function_stack();
    foreach ($aStack as $aItem){
        if (isset($aItem['function'])){
            $sOut .= $aItem['function'] ;
        }
        $sOut .= " " . $aItem['file'] . ":" . $aItem['line']."\n";
    }
    $sOut .= "=======================================================================\n";
    $sOut .= "=======================================================================\n";
    $sOut .= "=======================================================================\n\n\n";
    $fp = fopen($sFilename, "a");
    fwrite($fp, $sOut);
    fclose($fp);
}

function fix_fraction($sFraction, $sType = 'decimal'){
    if (! strstr($sFraction, '/')) return $sFraction;
    
    $aParts = explode("/", $sFraction);
    if ($sType == 'decimal'){
//        print $aParts[0] . '/' . $aParts[1] . '=' . $aParts[0] / $aParts[1] . "\n";
        return $aParts[0] / $aParts[1];
    }
    
    if ($sType == 'inverted'){
        if ($aParts[1] == 1){
            return $aParts[0];
        }
        elseif ($aParts[0] == 10 && $aParts[1] == 10){
            return 1;
        }
        elseif ($aParts[0] == 10){
            return "1/" . ($aParts[1]/10);
        }
        elseif ($aParts[0] == 1){
            return "1/" . $aParts[1];
        }
        else {
            return $aParts[0] / $aParts[1];
        }
        
    }
    
}

function get_exif($sFilename){
    $aExif = exif_read_data($sFilename, 0, true);
    $aExifOut = array(
        'camera' => 'unknown',
        'iso' => 'unknown',
        'shutter' => 'unknown',
        'aperture' => 'unknown',
        'focal' => 'unknown'
    );
    if (!isset($aExif['IFD0']) || !isset($aExif['EXIF'])){
        return $aExifOut;
    }
    
    if (isset($aExif['IFD0']['Model'])){
        $aExifOut['camera'] = $aExif['IFD0']['Model'];
    }
    if (isset($aExif['EXIF']['ISOSpeedRatings'])){
        $aExifOut['iso'] = $aExif['EXIF']['ISOSpeedRatings'];
    }
    if (isset($aExif['EXIF']['ExposureTime'])){
        $aExifOut['shutter'] = fix_fraction($aExif['EXIF']['ExposureTime'], 'inverted');
    }
    if (isset($aExif['EXIF']['FNumber'])){
        $aExifOut['aperture'] = fix_fraction($aExif['EXIF']['FNumber'], 'decimal');
    }
    if (isset($aExif['EXIF']['FocalLength'])){
        $aExifOut['focal'] = fix_fraction($aExif['EXIF']['FocalLength'], 'decimal');
    }
    
    return $aExifOut;
}