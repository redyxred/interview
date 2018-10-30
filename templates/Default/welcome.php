<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><? echo $this->title; ?></title>
    <link rel="stylesheet" href="<? echo $this->tplpath; ?>/css/style.css">
</head>
<body id="darkBody">
    <div class="logotype">
    	<span class="text">IW</span>
    </div>
	<div class="sub-text">
		Не знаешь что надеть?<br>Мы тебе поможем
	</div>
	<div id="background">
		
	</div>

	<div class="sub-text">
		Бесплатный сервис голосований<br>Создай аккаунт прямо сейчас!
		<img src="<? echo $this->tplpath; ?>/images/arrow.png" class="arrow">
		<div class="btnBlock">
			<a href="/register" class="register-button">Создать аккаунт</a>
			<a href="/login" class="login-href">Уже с нами?</a>
		</div>
	</div>

</body>
</html>