<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
    require ROOT.'/core/config.php';

	$email = trim(htmlspecialchars($_POST['email']));
	$password = trim(htmlspecialchars($_POST['password']));

	if (User::checkSession() == true) {
		die(User::jsonMessage(true, "Вы уже зарегистрированы. Войдите!"));
	} else {
    	if ($email != "" && $password != "") {
    		$db = new DB();
    		$sel_email = $db->query("SELECT * FROM `users` WHERE `email`='{$email}'");
			$sel_email = $sel_email->fetch();

			if ($sel_email['email'] == $email) {
    			$user_ip = "217.77.212.160";
    			$token = md5($user_ip);
				$password = md5($password);
				if ($sel_email['password'] == $password) {
					User::setSession($sel_email['user_id'], $token);
					die(User::jsonMessage(false, "Вы успешно вошли."));
				} else {
					die(User::jsonMessage(true, "Такого пользователя не существует :(2"));
				}
			} else {
				die(User::jsonMessage(true, "Такого пользователя не существует :(1"));
			}
	    } else {
	    	die(User::jsonMessage(true, "Заполните все поля."));
	    }
	}
?>