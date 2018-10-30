<?php
	class DB {

		private $pdo;

		public function __construct () {
			$dsn = "mysql:host=localhost;dbname=votes;charset=utf8";
			$opt = [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES => false
			];
			$test_connect = new PDO($dsn, "redyx", "12345qwe", $opt);
			if ($test_connect) {
				$this->pdo = $test_connect;
			} else {
				throw new Exception("DB connection failed!");
			}
		}

		public function query ($query) {
			return $this->pdo->query($query);
		}

		public function fetch($query) {
			return $query->fetch(PDO::FETCH_ASSOC);
		}

		public function fetchAll ($query) {
			return $query->fetchAll();
		}

		public function fetchColumn ($query) {
			return $this->pdo->query($query)->rowCount();
		}
	}
?>