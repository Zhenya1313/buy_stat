<?php
//use Main;
require_once('Classes/Main.php');

if($_REQUEST['action']){
    $webbsApiHandler = new \Main();
    if(
        method_exists($webbsApiHandler, $_REQUEST['action']) &&
        is_callable(array($webbsApiHandler, $_REQUEST['action']))
    ){

        $functionName = strval($_REQUEST['action']);
        echo $webbsApiHandler->$functionName($_REQUEST['data']);
    } else {
        echo 'function not found';
    }
}