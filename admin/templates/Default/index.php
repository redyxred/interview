<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?=$this->title?></title>
    <link rel="stylesheet" href="<?=$this->path?>/css/style.css">
    <link rel="stylesheet" href="<?=$this->path?>/css/fontawesome-all.css">
  </head>
  <body>
    <div id="left-content">
      <div class="logotype">
        <a href="/" class="text">IW</a>
      </div>

      <ul class="menu">
        <li><a href="/admin/all"><i class="fal fa-home"></i> <span>Домашняя страница</span></a></li>
        <li><a href="/admin/users"><i class="fal fa-users"></i> <span>Все пользователи</span></a></li>
        <li><a href="/admin/questions"><i class="fal fa-comments"></i> <span>Все опросы</span></a></li>
        <li><a href="/admin/settings"><i class="fal fa-sliders-h"></i> <span>Настройки</span></a></li>
        <li><a href="/admin/exit"><i class="fal fa-sign-out-alt"></i> <span>Выход</span></a></li>
      </ul>

    </div>

    <div id="header">
      <div class="title"><span class="dot"></span>Домашняя страница</div>
      <div class="user-panel">
        <div class="avatar"><a href="/user/1">МШ</a></div>
      </div>
    </div>

    <div id="right-content">
      <div id="block">

      </div>
    </div>
  </body>
</html>
