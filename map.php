<?php
session_start();
?>
<!doctype.html>
<html>
<head>
<title>Персональный сайт Мальцевой Веры Николаевны</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">

<script src="https://lidrekon.ru/slep/js/jquery.js"></script>
<script src="https://lidrekon.ru/slep/js/uhpv-full.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


</head>
<body class="bodyFon">
<div class="container">
	<?php require_once("./assets/header.php") ?>
	<div class="content">
		<div class="main">
			<div class='list_section col-xs-6 col-sm-12 col-md-12 headerText'>
					<h2 class="textAlighInCenter display-4">Карта сайта</h2>
			</div>
			<div class="menumap">
				<li><a href="/">Главная</a></li>
				<li>
				<a style="cursor:pointer;">Портфолио</a>
					<ul>
						<li><a href="/portfolio_mainInfo.php">Общие сведения</a></li>
						<li><a href="/portfolio_qualification.php">Повышение квалификации</a></li>
						<li><a href="/portfolio_contests.php">Участие в конкурсах</a></li>
						<li><a href="/portfolio_rewards.php">Награды и благодарности</a></li>
						<li><a href="/portfolio_publication.php">Обмен профессиональным опытом и публикации</a></li>
						<li><a href="/portfolio_metodWork.php">Методическая работа</a></li>
					</ul>
				</li>
				<li>
					<a style="cursor:pointer;">Студентам</a>
					<ul>
						<li><a href="/disciplines_matemat_1course.php">ОУД04. Математика. 1 курс</a></li>
						<li><a href="/disciplines_matemat_2course.php">ЕН01. Математика. 2 курс</a></li>
						<li><a href="/disciplines_digit_metods.php">Численные методы</a></li>
						<li><a href="/disciplines_mat_metods.php">Математические методы</a></li>
					</ul>
				</li>
				<li><a href="PCK.php">ПЦК</a></li>
				<li>
					<a style="cursor:pointer;">Классное руководство</a>
					<ul>
						<li><a href="/classroomGuide_groupsPhotos.php">Фотографии выпускных групп</a></li>
						<li><a href="/classroomGuide_PS14.php">ПС-14</a></li>
						<li><a href="/classroomGuide_PS18_main.php">ПС-18</a></li>
						<li><a href="/classroomGuide_metod.php">Методические разработки</a></li>
					</ul>
				</li>
				<li><a href="/usefullLinks.php">Полезные ссылки</a></li>
				<li><a href="/map.php">Карта сайта</a></li>
				<li><a>Обратная связь</a></li>
				</ul>
</div>
		</div>
  </div>
</div>
</body>
</html>
