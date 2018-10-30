<?php 
	define("ROOT", $_SERVER['DOCUMENT_ROOT']);
    require ROOT.'/core/config.php';

    $id = (int)$_POST['id'];

    if (!empty($id) && User::checkSession() == true) {
    	$user_id = $_SESSION['user_id'];
    	$db = new DB();
    	$sel = $db->fetchColumn("SELECT * FROM `votes` WHERE `user_id`='{$user_id}' AND `answer_id`='{$id}'");
    	if ($sel == 0) {
	    	$date = date ("Y-m-d H:i:s");
    		$ins = $db->query("INSERT INTO `votes` (`user_id`, `answer_id`, `date`) VALUES ('{$user_id}', '{$id}', '{$date}')");
    		if ($ins == true) {
    			die(User::jsonMessage(false));
    		} else {
    			die(User::jsonMessage(true, "Ошибка"));
    		}
    	} else {
    		die(User::jsonMessage(true, "Вы уже голосовали."));
    	}
    } else {
    	die(User::jsonMessage(true, "Ошибка"));
    }
?>