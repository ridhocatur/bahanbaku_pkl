<?php

if(!session_id())
{
    session_start();
}

require_once '../app/init.php'; //teknik Boostrapping

$app = new App;

// header("location:".BASEURL."/login");