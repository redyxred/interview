<?php
    define("ROOT", __DIR__);
    require ROOT.'/core/config.php';

    try {
        $tpl = new Template($conf_template); // Подключаем шаблонизатор
        $db = new DB();

        $page = $_GET['page'];
        $tpl->setVar("tplpath", "/templates/{$conf_template}");
        switch ($page) {
            case 'login':
                if (User::checkSession() == true) { header("Location: /profile"); }
                $tpl->setVar("title", $conf_sitename." - Авторизация");
                $tpl->load("login");
                break;
            case 'register':
                if (User::checkSession() == true) { header("Location: /profile"); }
                $tpl->setVar("title", $conf_sitename."- Создание аккаунта");
                $tpl->load("register");
                break;
            case 'logout':
                User::clearSession();
                header("Location: /");
                break;
            case 'profile':
                if (User::checkSession() == false) { header("Location: /login"); }
                $tpl->setVar("title", $conf_sitename." - Профиль пользователя");
                $tpl->setVar("user", User::get($_SESSION['user_id']));
                $tpl->load("profile");
                break;
            case 'country':
                if (User::checkSession() == false) { header("Location: /login"); }
                $tpl->setVar("questions", Questions::get($_GET['country']));
                $tpl->setVar("user", User::get($_SESSION['user_id']));
                $tpl->setVar("title", "Страна ".$_GET['country']);
                $tpl->load("index");
                break;
            case 'add':
                if (User::checkSession() == false) { header("Location: /login"); }
                $tpl->setVar("title", "Добавление опроса");
                $tpl->load("add-question");
                break;
            default:
                if (User::checkSession() == true) {
                    $tpl->setVar("questions", Questions::get());
                    $tpl->setVar("user", User::get($_SESSION['user_id']));
                    $tpl->setVar("title", $conf_sitename." ".$_GET['']);
                    $tpl->load("index");
                } else {
                    $tpl->setVar("title", $conf_sitename);
                    $tpl->load("welcome");
                }
                break;
        }
    } catch (Exception $e) {
        die("[Platforms] ".$e->getMessage());
    }
?>
