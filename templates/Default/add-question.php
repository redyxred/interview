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
			<div class="title"><?=$this->title?></div>
		</div>

		<div id="left-block">
			<div id="block">
				<form method="POST" id="addQuestion">
					<div class="head-vote">
						<input type="text" name="question" class="title" placeholder="Введите Ваш вопрос...">
						<!-- <div class="count-votes">Всего  голос</div> -->
						<div class="user"><a href="/user/1">Максим Шибков</a></div>
					</div>
					<div class="variants-vote">
						<ul class="variants">
							<li>
								<input type="text" class="text" name="variants[]" placeholder="Вариант ответa...">
							</li>
							<li>
								<input type="text" class="text" name="variants[]" placeholder="Вариант ответa...">
							</li>
							<li>
								<input type="text" class="text" name="variants[]" placeholder="Вариант ответa...">
							</li>
						</ul>
						<button id="addQuestionBtn">Опубликовать</button>
					</div>
				</form>
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