<?php
    session_start();

    // GLOBAL SETTINGS
    $conf_sitename = "Interview.UA - Опросы на любой вкус";
    $conf_host = "http://iw.ua/";
    $conf_template = "Default";

    // DB CONNECTION SETTINGS
    $conf_db_host = "localhost";
    $conf_db_user = "redyx";
    $conf_db_password = "12345";
    $conf_db_name = "votes";
    $conf_db_charset = "utf8";

    spl_autoload_register(function ($class) {
        require_once "/classes/".$class.".class.php";
    });
?>
