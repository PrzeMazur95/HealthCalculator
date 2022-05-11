<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', DS . 'opt' . DS . 'lampp' . DS . 'htdocs' . DS . 'HealthCalculator');

define('INCLUDES_PATH', SITE_ROOT.DS.'uploads'.DS.'images');

spl_autoload_register('myAutoLoader');


function myAutoLoader ($className){

    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if(strpos($url, 'includes') !== false) {

        $path = '../classes/';

    } else {

        $path = 'classes/';

    }

    $extension = '.class.php';
    require_once $path.$className.$extension;
    
}

?>