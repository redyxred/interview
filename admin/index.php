<?php
  define("ROOT", $_SERVER['DOCUMENT_ROOT']);
  require_once ROOT."/core/config.php";


  if ($conf_use_admin == false) { die("Возможность ограничена."); }

  try {
    $tpl = new Template("admin/templates", $conf_template);
    $tpl->setVar("path", "/admin/templates/Default");
    $page = $_GET['page'];

    switch ($page) {
      case 'all-users':
        $tpl->setVar("users", Admin::getUsers());
        $tpl->load("all-users");
        break;

      default:
        $tpl->load("index");
        break;
    }
  } catch (Exception $e) {
    die($e->getMessage());
  }
?>
