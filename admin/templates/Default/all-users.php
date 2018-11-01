<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?=$this->path?>/css/style.css">
  </head>
  <body>
    <table>
      <thead>
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
      </thead>
  <? for($i = 0; $i < count($this->users); $i++): ?>
      <tbody>
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
      </tbody>
  <? endfor; ?>
  </table>
  </body>
</html>
