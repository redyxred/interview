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
      <div class="title"><span class="dot"></span>Все пользователи</div>
      <div class="user-panel">
        <div class="avatar"><a href="/user/1">МШ</a></div>
      </div>
    </div>

    <div id="right-content">
      <div id="block">
          <table>
            <tr>
              <th>#</th>
              <th>Имя</th>
              <th>Фамилия</th>
              <th>E-Mail</th>
              <th>Регион</th>
              <th>Дата регистрации</th>
              <th>Рейтинг</th>
              <th>Уровень</th>
              <th>Группа</th>
              <th>Действия</th>
            </tr>
        <? for($i = 0; $i < count($this->users); $i++): ?>
            <tr>
              <td><?=$this->users[$i]['user_id']?></td>
              <td><?=$this->users[$i]['name']?></td>
              <td><?=$this->users[$i]['surname']?></td>
              <td><?=$this->users[$i]['email']?></td>
              <td><?=$this->users[$i]['country']?></td>
              <td><?=$this->users[$i]['reg_date']?></td>
              <td><?=$this->users[$i]['rating']?></td>
              <td><?=$this->users[$i]['level']?></td>
              <td><?=$this->users[$i]['group']?></td>
              <td><button onclick="deleteUser("<?=$this->users[$i]['user_id']?>");">Удалить</button></td>
            </tr>
        <? endfor; ?>
        </table>
      </div>
    </div>
  </body>
</html>
