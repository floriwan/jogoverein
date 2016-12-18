<?php 
    $GLOBALS['lang'] = 'de';
    if (!isset($_GET['lang']))
        $GLOBALS['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    else
        $GLOBALS['lang'] = $_GET['lang'];
            
    if (!file_exists("header_$lang.php") || !file_exists("body_$lang.php"))
        $GLOBALS['lang'] = 'de';
?>