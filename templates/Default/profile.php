<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?=$this->title?></title>
	<link rel="stylesheet" href="<?=$this->tplpath?>/css/style.css">
	<link rel="stylesheet" href="<?=$this->tplpath?>/css/progress.css">
</head>
<body id="lightBody">
	<div id="header">
		<div class="logotype">
			<a href="/">IW</a>
		</div>
	</div>

	<div id="wrContent">
		<div id="subHeader">
			<div class="title">Профиль</div>
		</div>

		<div id="left-block">
			<div id="block">
				<div class="left-profile-block">
					<div class="avatar">
						<span><?=$this->user['avatar']?></span>
					</div>
					<ul class="points">
						<li>
							<div class="top">УРОВЕНЬ</div>
							<div class="bottom"><?=$this->user['level']?></div>
						</li>
						<li>
							<div class="top">РЕЙТИНГ</div>
							<div class="bottom"><?=$this->user['rating']?></div>
						</li>
					</ul>
				</div>
				<form method="POST" id="editForm">
					<div class="right-profile-block">
						<div class="head">
							<div class="userName">
								<span id="userName"><?=$this->user['name']?> <?=$this->user['surname']?></span>
								<span id="editBtn">
									<button class="editBtn">Редактировать</button>
								</span>
							</div>
							<div class="userLocation"><?=$this->user['city']?>, <?=$this->user['country_name']?></div>
						</div>
						<ul class="detail-information">
							<li class="left">Опросы</li>
							<li class="right"><?=$this->user['count_questions']?></li><br>
							<li class="left">E-Mail</li>
							<li class="right"><span id="email"><?=$this->user['email']?></span></li><br>
							<li class="left">Город</li>
							<li class="right"><?=$this->user['city']?></li><br>
							<li class="left">Страна</li>
							<li class="right"><?=$this->user['country_name']?> (<?=$this->user['country']?>)</li>
						</ul>
					</div>
				</form>
				<div id="clear"></div>
			</div>
		</div>

		<div id="right-block">
			<div id="block">
				<div class="title">Категории</div>
				<ul class="categories">
					<li><a href="/popular">Популярные вопросы</a></li>
					<li><a href="/region">По близости</a></li>
				</ul>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="<?=$this->tplpath?>/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?=$this->tplpath?>/js/engine.js"></script>
</body>
</html>