<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
    require ROOT.'/core/config.php';

	$email = trim(htmlspecialchars($_POST['email']));
	$password = trim(htmlspecialchars($_POST['password']));
	$r_password = trim(htmlspecialchars($_POST['r_password']));

	if (User::checkSession() == true) {
		die(User::jsonMessage(true, "Вы уже зарегистрированы. Войдите!"));
	} else {
    	if ($email != "" && $password != "" && $r_password != "") {
			if ($password == $r_password) {
	    		$db = new DB();
				
				$sel_email = $db->query("SELECT * FROM `users` WHERE `email`='{$email}'");
				$sel_email = $sel_email->fetch();
				
    			if ($sel_email['email'] != $email) {
	    			$password = md5($password);
	    			// $user_ip = $_SERVER['REMOTE_ADDR'];
	    			$user_ip = "138.117.128.0";
	    			$token = md5($user_ip);

					$json_ip = file_get_contents("https://api.develnext.org/data/v1/ip/{$user_ip}");
					$json_ip = json_decode($json_ip, true);
	    			$city = $json_ip['city']['names']['ru'];
	    			$continent = $json_ip['continent'];
	    			$country = $json_ip['country']['iso'];
	    			$country_name = $json_ip['country']['names']['ru'];
	    			
	    			$sel_region = $db->query("SELECT * FROM `regions` WHERE `city`='{$city}'");
	    			$sel_region = $sel_region->fetch();

	    			if ($sel_region['city'] == $city) {
	    				$region_id = $sel_region['region_id'];
	    			} else {
	    				$ins_region = $db->query("INSERT INTO `regions` (`city`, `continent`, `country`, `country_name`) VALUES ('{$city}', '{$continent}', '{$country}', '{$country_name}')");
	    				$sel_region = $db->query("SELECT * FROM `regions` WHERE `city`='{$city}'");
	    				$sel_region = $sel_region->fetch();
	    				$region_id = $sel_region['region_id'];
	    			}

	    			$res = $db->query("INSERT INTO `users` (`email`, `password`, `country`, `reg_date`, `token`) VALUES ('{$email}', '{$password}', '{$region_id}', '{$reg_date}', '{$token}')");
	    			if ($res == true) {
	    				$sel_user = $db->query("SELECT * FROM `users` WHERE `email`='{$email}'");
	    				$sel_user = $sel_user->fetch();

	    				User::setSession($sel_user['user_id'], $token);
						die(User::jsonMessage(false, "Вы успешно прошли регистрацию!"));
	    			} else {
	    				die(User::jsonMessage(true, "Ошибка, Вы не зарегистрированы."));
	    			}
	    		} else {
					die(User::jsonMessage(true, "Увы. Такой адрес электронной почты уже был зарегистрирован ранее."));
	    		}
    		} else {
    			die(User::jsonMessage(true, "Введённые Вами пароли не совпадают."));
    		}
	    } else {
	    	die(User::jsonMessage(true, "Заполните все поля."));
	    }
	}
?>