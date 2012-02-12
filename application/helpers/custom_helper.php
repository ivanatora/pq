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