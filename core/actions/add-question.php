<?php
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
    require ROOT.'/core/config.php';

    $question = trim(htmlspecialchars($_POST['question']));
    $variants = $_POST['variants'];

    if ($question != "" && $variants[0] != "") {
    	$db = new DB();
    	$user_id = $_SESSION['user_id'];
    	$date = date ("Y-m-d H:i:s");

    	$ins_question = $db->query("INSERT INTO `questions` (`title`, `user_id`, `region_id`, `date`) VALUES ('{$question}', '{$user_id}', '{$region_id}', '{$date}')");

    	if ($ins_question == true) {
	    	$sel_question = $db->query("SELECT * FROM `questions` WHERE `title`='{$question}' AND `user_id`='{$user_id}'");
	    	$sel_question = $sel_question->fetch();
	    	if ($question == $sel_question['title'] && $user_id == $sel_question['user_id']) {
	    		$id_question = $sel_question['id'];
	    		$ins_variants = null;
	    		foreach ($variants as $k => $v) {
	    			$v = trim(htmlspecialchars($v));
	    			if($v != "") {
	    				$ins_variants = $db->query("INSERT INTO `answers` (`id_questions`, `text`) VALUES ('{$id_question}', '{$v}')");
	    			}
	    		}

	    		if ($ins_variants == true) {
	    			die(User::jsonMessage(false, "Опрос успешно опубликован :)"));
	    		} else {
	    			die(User::jsonMessage(true, "Произошла ошибка, повторите запрос позже 3..."));
	    		}
	    	} else {
	    		die(User::jsonMessage(true, "Произошла ошибка, повторите запрос позже 2..."));
	    	}
	    } else {
	    	die(User::jsonMessage(true, "Произошла ошибка, повторите запрос позже 1..."));
	    }
    } else {
    	die(User::jsonMessage(true, "Пожалуйста, заполните все поля!"));
    }
?>