<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><? echo $this->title; ?></title>
	<link rel="stylesheet" href="<? echo $this->tplpath; ?>/css/style.css">
</head>
<body id="darkBody">
    <div class="logotype">
    	<span class="text">IW</span>
    </div>
	<div id="register-form">
		<form method="POST" id="regForm">
			<h3>Создание аккаунта пользователя</h3>
			<label for="email">Сперва нам понадобится Ваш адрес электронной почты</label>
			<input type="email" name="email" id="email" placeholder="Ваш e-mail"><br>
			<label for="password">Теперь Вы должны придумать пароль и повторить его ввод</label><br>
			<input type="password" name="password" id="password" placeholder="Ваш пароwль">
			<input type="password" name="r_password" id="r_password" placeholder="Повторите пароль">
			<input type="submit" name="register" value="" id="register">
		</form>
	</div>

	<script type="text/javascript" src="<? echo $this->tplpath; ?>/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<? echo $this->tplpath; ?>/js/engine.js"></script>
</body>
</html>