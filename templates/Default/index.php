<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><? echo $this->title; ?></title>
	<link rel="stylesheet" href="<? echo $this->tplpath; ?>/css/style.css">
	<link rel="stylesheet" href="<? echo $this->tplpath; ?>/css/progress.css">
</head>
<body id="lightBody">
	<div id="header">
		<div class="logotype">
			<a href="/">IW</a>
		</div>
	</div>

	<div id="wrContent">
		<div id="subHeader">
			<div class="title"><?=$this->title?></div>
			<a href="/add" class="href-btn">Добавить опрос</a>
		</div>

		<div id="left-block">
		<? if ($this->questions != null): ?>
			<? for ($i = 0; $i < count($this->questions); $i++): ?>
			<div id="block">
				<div class="head-vote">
					<div class="title"><?=$this->questions[$i]['title']?></div>
					<div class="count-votes">Всего <?=$this->questions[$i]['sumVotes']?> голос</div>
					<? if($this->questions[$i]['user_id'] == $this->user['user_id']): ?>
					<div class="delete-question" onclick="deleteQuestion('<?=$this->questions[$i]['id']?>');">Удалить</div>
					<? endif; ?>
					<div class="user"><a href="/user/1"><?=$this->questions[$i]['author']?></a></div>
				</div>
				<div class="variants-vote">
					<ul class="variants">
						<? for ($k = 0; $k < count($this->questions[$i]['variants'][$k]); $k++): ?>
						<li>
							<div class="text" onclick="sendVote('<?=$this->questions[$i]['variants'][$k]['id']?>');"><?=$this->questions[$i]['variants'][$k]['text']?></div>
							<div class="progress">
								<progress data="<?=$this->questions[$i]['variants'][$k]['countVotes']?> голосa" max="<?=$this->questions[$i]['sumVotes']?>" value="<?=$this->questions[$i]['variants'][$k]['countVotes']?>"></progress>
							</div>
						</li>
						<? endfor; ?>
					</ul>
				</div>
			</div>
			<? endfor; ?>
		<? else: ?>
			<div id="not-found">
				<img src="<?=$this->tplpath?>/images/error.png" alt="">
				Ничего не найдено :(
			</div>
		<? endif; ?>
		</div>

		<div id="right-block">
			<div id="block">
				<div class="title">Меню</div>
				<ul class="categories">
					<? if ($this->user['group'] == 1): ?>
					<li><a href="/admin">Админ-панель</a></li>
					<? endif; ?>
					<li><a href="/popular">Популярные вопросы</a></li>
					<li><a href="/country/<?=$this->user['country']?>">В вашей стране</a></li><br>
					<li><a href="/logout">Выйти из аккаунта</a></li>
				</ul>
			</div>
			<div id="block">
				<div class="title">Профиль</div>
				<div class="avatar">
					<span><?=$this->user['avatar']?></span>
				</div>
				<div class="username"><a href="/profile"><?=$this->user['name']?> <?=$this->user['surname']?></a></div>
				<div class="userlevel">Уровень <?=$this->user['level']?></div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="<? echo $this->tplpath; ?>/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<? echo $this->tplpath; ?>/js/engine.js"></script>
</body>
</html>
