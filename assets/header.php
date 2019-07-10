<?php
if(empty($_SESSION['login'])){
	echo <<<HTML
		<header class="global-header" id="header">
			<div class="page-container">
			<a href="/" alt="logo" class="logo">
			</a>
			<nav>
				<ul>
					<li>
						<a id="specialButton" href="#"><img src="https://lidrekon.ru/images/special.png" alt="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" title="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" /></a>
					</li>
					<li>
						<a href="login.php">Авторизация</a>
					</li>
				</ul>
			</nav>

		</div>
	    </header>

		<div class="header">
	<img src="img/zamt-fon.jpg" alt="шапка" class = "hat"/>
		</div>
		<div class="top-menu">
	<ul class="menu">
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
	</ul>
	<div><a href="#top" class="idTop"><img></a></div>
</div>
HTML;
}

if(!empty($_SESSION['login']) && $_SESSION['login'] == 'student'){
	echo <<<HTML
		<header class="global-header">
			<div class="page-container">
			<a href="/" alt="logo" class="logo">
			</a>
			<nav>
				<ul>
					<li>
						<a id="specialButton" href="#"><img src="https://lidrekon.ru/images/special.png" alt="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" title="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" /></a>
					</li>
					<li>
						<a href="logout.php">Выйти</a>
					</li>
					<li>
						<h4 style="text-decoration:none;">{$_SESSION['login']}</h4>
					</li>
				</ul>
			</nav>

		</div>
	    </header>
		<div class="header">
	<img src="img/zamt-fon.jpg" alt="шапка" class = "hat"/>
		</div>
		<div class="top-menu">
	<ul class="menu">
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
	</ul>
		<div><a href="#top" class="idTop"><img></a></div>
</div>
HTML;
}else if(!empty($_SESSION['login']) && $_SESSION['login'] == 'admin'){
	echo <<<HTML
		<header class="global-header">
			<div class="page-container">
			<a href="/" alt="logo" class="logo">
			</a>
			<nav>
				<ul>
					<li>
						<a id="specialButton" href="#"><img src="https://lidrekon.ru/images/special.png" alt="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" title="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" /></a>
					</li>
					<li>
						<a href="/passwordChange.php">Сменить пароль</a>
					</li>
					<li>
						<a href="logout.php">Выйти</a>
					</li>
					<li>
						<h4 style="text-decoration:none;">{$_SESSION['login']}</h4>
					</li>
				</ul>
			</nav>

		</div>
	    </header>
		<div class="header">
	<img src="img/zamt-fon.jpg" alt="шапка" class = "hat"/>
		</div>
		<div class="top-menu">
	<ul class="menu">
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
	</ul>
		<div><a href="#top" class="idTop"><img></a></div>
</div>
HTML;
}else if(!empty($_SESSION['login'])){
	echo <<<HTML
		<header class="global-header">
			<div class="page-container">
			<a href="/" alt="logo" class="logo">
			</a>
			<nav>
				<ul>
					<li>
						<a href="/comments.php">Обратная связь</a>
					</li>
					<li>
						<a id="specialButton" href="#"><img src="https://lidrekon.ru/images/special.png" alt="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" title="ВЕРСИЯ ДЛЯ СЛАБОВИДЯЩИХ" /></a>
					</li>
					<li>
						<a href="logout.php">Выйти</a>
					</li>
					<li>
						<h4 style="text-decoration:none;">{$_SESSION['login']}</h4>
					</li>
				</ul>
			</nav>

		</div>
			</header>
		<div class="header">
				<img src="img/zamt-fon.jpg" alt="шапка" class = "hat"/>
		</div>
		<div class="top-menu">
	<ul class="menu">
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
		<li><a href="/adminPanel">Карта сайта</a></li>
	</ul>
		<div><a href="#top" class="idTop"><img></a></div>
</div>
HTML;
}
?>
