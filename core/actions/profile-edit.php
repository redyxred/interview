<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
    require ROOT.'/core/config.php';

    $username = trim(htmlspecialchars($_POST['username']));
    $email = trim(htmlspecialchars($_POST['email']));

    $db = new DB();
    $user_id = $_SESSION['user_id'];

    if ($username == "" && $email == "") {
    	die(User::jsonMessage(false));
    }

	$username = explode(" ", $username);

	if (count($username) == 2) {
		$name = $username[0];
		$surname = $username[1];

		$ins_username = $db->query("UPDATE `users` SET `name`='{$name}', `surname`='{$surname}' WHERE `user_id`='{$user_id}'");

		if ($ins_username == true) {
			die(User::jsonMessage(false, "Профиль отредактирован. Информация сохранена :)"));
		} else {
			die(User::jsonMessage(true, "Ошибка, информация не изменена.. Попробуйте позже"));
		}
	} else {
		die(User::jsonMessage(true, "Соблюдайте правильность ввода (Имя Фамилия)"));
	}

	$sel_email = $db->query("SELECT * FROM `users` WHERE `email`='{$email}'");
	$sel_email = $sel_email->fetch();

	if ($sel_email['email'] != $email) {
		$ins_email = $db->query("UPDATE `users` SET `email`='{$email}' WHERE `user_id`='{$user_id}'");

		if ($ins_email == true) {
			die(User::jsonMessage(false, "Профиль отредактирован. Информация сохранена :)"));
		} else {
			die(User::jsonMessage(true, "Ошибка, информация не изменена.. Попробуйте позже"));
		}
	} else {
		die(User::jsonMessage(true, "Такой адрес электронной почты уже привязан к другому аккаунту :("));
	}
?>