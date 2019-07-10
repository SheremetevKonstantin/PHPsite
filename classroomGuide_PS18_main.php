<?php
session_start();
?>
<!doctype.html>
<html>
<head>
<?php
require_once("./assets/conn.php");
?>
<title>Персональный сайт Мальцевой Веры Николаевны</title>
<meta charset=utf-8>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">

<script src="https://lidrekon.ru/slep/js/jquery.js"></script>
<script src="https://lidrekon.ru/slep/js/uhpv-full.min.js"></script>
</head>
<body class="bodyFon">
<div class="container">
	<?php require_once("./assets/header.php") ?>
	<div class="content">
		<div class="main">
			<div class="row">
				<div class='list_section col-xs-6 col-sm-12 col-md-12 headerText'>
						<h2 class="textAlighInCenter display-4">ПС-18</h2>
				</div>
				<div class='list_section col-xs-1 col-sm-3 col-md-2 divLittleMenuPS18'
				onmouseover="this.style.backgroundColor='white'; this.style.boxShadow='0 0 10px rgba(0,0,0, 0.5)'; this.style.borderRadius='7px';  this.style.backgroundImage='-moz-linear-gradient(rgba(255,255,255,0),#ffffff)';  this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(129, 162, 199))';"
				onmouseout="this.style.backgroundColor='rgba(255,255,255, 0)'; this.style.boxShadow='0 0 0px rgba(255,255,255, 0)'; this.style.borderRadius='7px'; this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(211, 219, 228))';">
							<a href = "/classroomGuide_PS18.php?tag=1" style="text-decoration: none;"><div class="parentDivForTextMenu">
								<p class="childForTextMenu h2">1 курс</p>
							</div></a>
				</div>
				<div class='list_section col-xs-1 col-sm-3 col-md-2 divLittleMenuPS18'
				onmouseover="this.style.backgroundColor='white'; this.style.boxShadow='0 0 10px rgba(0,0,0, 0.5)'; this.style.borderRadius='7px';  this.style.backgroundImage='-moz-linear-gradient(rgba(255,255,255,0),#ffffff)';  this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(129, 162, 199))';"
				onmouseout="this.style.backgroundColor='rgba(255,255,255, 0)'; this.style.boxShadow='0 0 0px rgba(255,255,255, 0)'; this.style.borderRadius='7px'; this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(211, 219, 228))';">
							<a href = "/classroomGuide_PS18.php?tag=2" style="text-decoration: none;"><div class="parentDivForTextMenu">
								<p class="childForTextMenu h2">2 курс</p>
							</div></a>
				</div>
				<div class='list_section col-xs-1 col-sm-3 col-md-2 divLittleMenuPS18'
				onmouseover="this.style.backgroundColor='white'; this.style.boxShadow='0 0 10px rgba(0,0,0, 0.5)'; this.style.borderRadius='7px';  this.style.backgroundImage='-moz-linear-gradient(rgba(255,255,255,0),#ffffff)';  this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(129, 162, 199))';"
				onmouseout="this.style.backgroundColor='rgba(255,255,255, 0)'; this.style.boxShadow='0 0 0px rgba(255,255,255, 0)'; this.style.borderRadius='7px'; this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(211, 219, 228))';">
							<a href = "/classroomGuide_PS18.php?tag=3" style="text-decoration: none;"><div class="parentDivForTextMenu">
								<p class="childForTextMenu h2">3 курс</p>
							</div></a>
				</div>
				<div class='list_section col-xs-1 col-sm-3 col-md-2 divLittleMenuPS18'
				onmouseover="this.style.backgroundColor='white'; this.style.boxShadow='0 0 10px rgba(0,0,0, 0.5)'; this.style.borderRadius='7px';  this.style.backgroundImage='-moz-linear-gradient(rgba(255,255,255,0),#ffffff)';  this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(129, 162, 199))';"
				onmouseout="this.style.backgroundColor='rgba(255,255,255, 0)'; this.style.boxShadow='0 0 0px rgba(255,255,255, 0)'; this.style.borderRadius='7px'; this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(211, 219, 228))';">
							<a href = "/classroomGuide_PS18.php?tag=4" style="text-decoration: none;"><div class="parentDivForTextMenu">
								<p class="childForTextMenu h2">4 курс</p>
							</div></a>
				</div>
				<div class='list_section col-xs-6 col-sm-12 col-md-12 marginTopFivePercent'>
						<img alt="Фотография группы ПС-18" src="img/ClassroomGuide/PS18/PS18.png" class="imgInDiv">
				</div>
				<div class='list_section col-xs-6 col-sm-12 col-md-12 marginTopFivePercent'>
						<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vSIifuMSHNf0Eo5K6i9cwUH6_BMKiz2mRjG0JahaED4dYFsFLrT9V7JWGrCIW-Gwg/embed?start=true&loop=true&delayms=5000"
						 frameborder="0" width="100%" height="749" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
				</div>
			</div>
		</div>
  </div>
</div>
</body>
</html>
