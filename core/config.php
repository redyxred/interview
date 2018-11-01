<?php
    session_start();

    // ГЛОБАЛЬНЫЕ НАСТРОЙКИ
    $conf_sitename = "Interview.UA - Опросы на любой вкус"; // Название сайта
    $conf_domain = "http://iw.ua/"; // Домен сайта (Напр.: http://example.com/)
    $conf_template = "Default"; // Название шаблона

    // НАСТРОЙКИ ДЛЯ ПОДКЛЮЧЕНИЯ К MySQL
    $conf_db_host = "localhost"; // Хост для подключение к БД
    $conf_db_user = "redyx"; // Пользователь базы данных
    $conf_db_password = "12345"; // Пароль пользователя базы данных
    $conf_db_name = "votes"; // Имя базы данных
    $conf_db_charset = "utf8"; // Кодировка базы данных

    $conf_use_admin = true; // Использовать админ-панель (true - да, false - нет)
    $conf_admin_group = "1";  // Группа для администраторов

    // ВСЁ ЧТО ДАЛЬШЕ НЕ ТРОГАТЬ!!!
    spl_autoload_register(function ($class) {
        require_once "/classes/".$class.".class.php";
    });
?>
