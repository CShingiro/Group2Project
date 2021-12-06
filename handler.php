<?php
    ini_set('allow_url_fopen',1);
    switch(@parse_url($_SERVER['REQUEST_URI'])['path']) {
        case '/result_contact.php':
            require 'result_contact.php';
        case '/checkout.php':
            require 'checkout.php';
        
    }
?>