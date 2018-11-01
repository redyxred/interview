<?php
  define("ROOT", $_SERVER['DOCUMENT_ROOT']);
  require_once ROOT."/core/config.php";


  if ($conf_use_admin == false) { die("Возможность ограничена."); }

  try {
    $page = $_GET['page'];

    switch ($page) {
      case 'users':
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
