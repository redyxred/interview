<?php
  define("ROOT", $_SERVER['DOCUMENT_ROOT']);
  require ROOT.'/core/config.php';


  $question_id = trim(htmlspecialchars($_POST['question_id']));

  if ($question_id != "") {
    $db = new DB();
    $sel_question = $db->query("SELECT * FROM `questions` WHERE `id`='{$question_id}'");
    $sel_question = $sel_question->fetch();

    if ($sel_question['id'] == $question_id) {
      if ($sel_question['user_id'] == $_SESSION['user_id']) {
        $del_question = $db->query("DELETE FROM `questions` WHERE `id`='{$question_id}'");
        if ($del_question == true) {
          die(User::jsonMessage(false));
        } else {
          die(User::jsonMessage(true, "Ошибка, опрос не был удалён."));
        }
      } else {
        die(User::jsonMessage(true, "Этот опрос Вам не пренадлежит."));
      }
    } else {
      die(User::jsonMessage(true, "Такого опроса не существует!"));
    }
  } else {
    die(User::jsonMessage(true, "Ошибка запроса."));
  }
?>
