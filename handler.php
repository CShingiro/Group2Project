<?php
    ini_set('allow_url_fopen',1);
    switch(@parse_url($_SERVER['REQUEST_URI'])['path']) {
        case '/':
            require 'index.php';
        case '/index':
            require 'index.php';
        case '/index.php':
            require 'index.php';
        case '/result_contact.php':
            require 'result_contact.php';
        case '/checkout.php':
            require 'checkout.php';  
        case '/loginAction.php': 
            require 'loginAction.php';
        case 'signinAction.php':
            require 'signinAction.php';
    }
?>