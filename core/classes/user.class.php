<?php
  define("ROOT", $_SERVER['DOCUMENT_ROOT']);
  require ROOT.'/core/config.php';

	class User {
		public static function checkSession() {
			$user_id = $_SESSION['user_id'];
			$token = $_SESSION['token'];

			if ($user_id == true && $token == true) {
				return true;
			} else {
				return false;
			}
		}

		public static function jsonMessage($type, $text = "") {
			$arr = array(
				'error' => $type,
				'message' => $text
			);
			return json_encode($arr);
		}

		public static function setSession($id, $token) {
			$_SESSION['user_id'] = $id;
			$_SESSION['token'] = $token;
		}

		public static function clearSession () {
			$user_id = $_SESSION['user_id'];
			$db = new DB();
			$db->query("UPDATE `users` SET `token`=NULL WHERE `user_id`='{$user_id}'");
			unset($_SESSION['user_id']);
			unset($_SESSION['token']);
		}

		public static function getUserInfo ($uid, $name = "") {
			$db = new DB();
			$res = $db->query("SELECT * FROM `users` WHERE `user_id`='{$uid}'");
			$res = $res->fetch(PDO::FETCH_ASSOC);
			if ($name == "") {
				return $res;
			} else {
				return $res[$name];
			}
		}

		public static function getRegion ($user_id, $param = "") {
			$db = new DB();
			$reg_id = User::getUserInfo($user_id, "country");
			$sel_region = $db->query("SELECT * FROM `regions` WHERE `region_id`='{$reg_id}'");
			$sel_region = $sel_region->fetch();

			if ($param == "") {
				return $sel_region;
			} else {
				return $sel_region[$param];
			}
		}

		public static function get($uid) {
			$db = new DB();
			$arr = User::getUserInfo($uid);
			mb_internal_encoding("UTF-8");
			$avatar = mb_substr($arr['name'], 0, 1).mb_substr($arr['surname'], 0, 1);
			$arr['avatar'] = $avatar;
			$arr['city'] = User::getRegion($uid, "city");
			$arr['country'] = User::getRegion($uid, "country");
			$arr['country_name'] = User::getRegion($uid, "country_name");
			$arr['count_questions'] = $db->fetchColumn("SELECT `id` FROM `questions` WHERE `user_id`='{$uid}'");
			return $arr;
		}


	}
?>
