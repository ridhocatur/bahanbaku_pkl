<?php

    function check_already_login()
    {
        if(!empty($_SESSION['id'])) {
            header('Location: '.BASEURL.'/');
            exit;
        }
    }

    function check_not_login()
    {
        if(!isset($_SESSION['id'])) {
            header('Location: '.BASEURL.'/auth/login');
            exit;
        }
    }

