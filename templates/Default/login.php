<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><? echo $this->title; ?></title>
	<link rel="stylesheet" href="<? echo $this->tplpath; ?>/css/style.css">
</head>
<body>
	<form method="POST" id="loginForm">
		<input type="email" name="email" id="email">
		<input type="password" name="password" id="password">
		<input type="submit" name="login" value="" id="login">
	</form>
	
	<script type="text/javascript" src="<? echo $this->tplpath; ?>/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<? echo $this->tplpath; ?>/js/engine.js"></script>
</body>
</html>