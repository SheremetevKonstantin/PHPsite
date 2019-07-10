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
			<!-- Виджет Вконтакте для комментариев -->
			<script type="text/javascript" src="https://vk.com/js/api/openapi.js?160"></script>

			<script type="text/javascript">
			  VK.init({apiId: 6993044, onlyWidgets: true});
			</script>

			<!-- Put this div tag to the place, where the Comments block will be -->
			<div id="vk_comments"></div>
			<script type="text/javascript">
			VK.Widgets.Comments("vk_comments", {limit: 20, attach: false});
			</script>
		</div>
	</div>
</div>
</body>
</html>
