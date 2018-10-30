<?php
    define("ROOT", $_SERVER['DOCUMENT_ROOT']);
    require ROOT.'/core/config.php';

	class Questions {
		public static function get($country = null) {
			$result = array();
			$db = new DB();
			if ($country == "") {
				$ques_res = $db->query("SELECT * FROM `questions` ORDER BY `id` DESC");
			} else {
				$ques_res = $db->query("SELECT * FROM `questions` WHERE `region_id`='{$country}' ORDER BY `id` DESC");
			}
			$res = $ques_res->fetchAll(PDO::FETCH_ASSOC);

			for($i = 0; $i < count($res); $i++) {
				$id_question = $res[$i]['id'];
				$answer_res = $db->query("SELECT * FROM `answers` WHERE `id_questions`='{$id_question}'");
				$res_an = $answer_res->fetchAll(PDO::FETCH_ASSOC);
				$sumVotes = 0;
				for ($k = 0; $k < count($res_an); $k++) {
					$countAnswers = $db->fetchColumn("SELECT * FROM `votes` WHERE `answer_id`='{$res_an[$k]['id']}'");
					$res_an[$k]['countVotes'] = $countAnswers;
					$sumVotes += $countAnswers;
				}

				$res[$i]['variants'] = $res_an;
				$res[$i]['sumVotes'] = $sumVotes;
				$res[$i]['author'] = User::getUserInfo($res[$i]['user_id'], 'name').' '.User::getUserInfo($res[$i]['user_id'], 'surname');
			}
			return $res;
		}
	}
?>