<?php
    session_start();
    
    // GLOBAL SETTINGS
    $conf_sitename = "Votes UA";
    $conf_host = "http://votes.ua/";
    $conf_template = "Default";

    // DB CONNECTION SETTINGS
    $conf_db_host = "localhost";
    $conf_db_user = "redyx";
    $conf_db_pass = "12345";
    $conf_db_name = "votes";

    spl_autoload_register(function ($class) {
        require_once "/classes/".$class.".class.php";
    });
?>