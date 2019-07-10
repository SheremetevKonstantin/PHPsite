<?php
session_start();
require_once("./assets/conn.php");
include 'YandexDrive.php';
//AT
$path_AT_to_KOS = '/Студентам/Математика/ЕН01/АТ/КОС/';
$path_AT_to_RP = '/Студентам/Математика/ЕН01/АТ/РП/';
$path_AT_to_CurrentControl = '/Студентам/Математика/ЕН01/АТ/Текущий контроль/';
//БУ
$path_BU_to_KOS = '/Студентам/Математика/ЕН01/БУ/КОС/';
$path_BU_to_RP = '/Студентам/Математика/ЕН01/БУ/РП/';
$path_BU_to_CurrentControl = '/Студентам/Математика/ЕН01/БУ/Текущий контроль/';
//РА
$path_RA_to_KOS = '/Студентам/Математика/ЕН01/РА/КОС/';
$path_RA_to_RP = '/Студентам/Математика/ЕН01/РА/РП/';
$path_RA_to_CurrentControl = '/Студентам/Математика/ЕН01/РА/Текущий контроль/';
//ТМ
$path_TM_to_KOS = '/Студентам/Математика/ЕН01/ТМ/КОС/';
$path_TM_to_RP = '/Студентам/Математика/ЕН01/ТМ/РП/';
$path_TM_to_CurrentControl = '/Студентам/Математика/ЕН01/ТМ/Текущий контроль/';
//ЭО
$path_EO_to_KOS = '/Студентам/Математика/ЕН01/ЭО/КОС/';
$path_EO_to_RP = '/Студентам/Математика/ЕН01/ЭО/РП/';
$path_EO_to_CurrentControl = '/Студентам/Математика/ЕН01/ЭО/Текущий контроль/';

$query = "SELECT COUNT(id) FROM prList_AT;";
$result = mysqli_query($conn, $query);
$prListCountAT = mysqli_fetch_assoc($result);
$prListCountAT = $prListCountAT["COUNT(id)"];

$query2 = "SELECT number from prList_AT;";
$result2 = mysqli_query($conn,$query2);
$numberListAT = array();
while ($row = $result2->fetch_array())
	$numberListAT[] = $row[0];

$query2 = "SELECT name from prList_AT;";
$result2 = mysqli_query($conn,$query2);
$namesListAT = array();
while ($row = $result2->fetch_array())
	$namesListAT[] = $row[0];

$query2 = "SELECT id from prList_AT;";
$result2 = mysqli_query($conn,$query2);
$IdListAT = array();
while ($row = $result2->fetch_array())
	$IdListAT[] = $row[0];

$query = "SELECT COUNT(id) FROM prList_BU;";
$result = mysqli_query($conn, $query);
$prListCountBU = mysqli_fetch_assoc($result);
$prListCountBU = $prListCountBU["COUNT(id)"];

$query2 = "SELECT number from prList_BU;";
$result2 = mysqli_query($conn,$query2);
$numberListBU = array();
while ($row = $result2->fetch_array())
	$numberListBU[] = $row[0];

$query2 = "SELECT name from prList_BU;";
$result2 = mysqli_query($conn,$query2);
$namesListBU = array();
while ($row = $result2->fetch_array())
	$namesListBU[] = $row[0];

$query2 = "SELECT id from prList_BU;";
$result2 = mysqli_query($conn,$query2);
$IdListBU = array();
while ($row = $result2->fetch_array())
	$IdListBU[] = $row[0];

$query = "SELECT COUNT(id) FROM prList_RA;";
$result = mysqli_query($conn, $query);
$prListCountRA = mysqli_fetch_assoc($result);
$prListCountRA = $prListCountRA["COUNT(id)"];

$query2 = "SELECT number from prList_RA;";
$result2 = mysqli_query($conn,$query2);
$numberListRA = array();
while ($row = $result2->fetch_array())
	$numberListRA[] = $row[0];

$query2 = "SELECT name from prList_RA;";
$result2 = mysqli_query($conn,$query2);
$namesListRA = array();
while ($row = $result2->fetch_array())
	$namesListRA[] = $row[0];

$query2 = "SELECT id from prList_RA;";
$result2 = mysqli_query($conn,$query2);
$IdListRA = array();
while ($row = $result2->fetch_array())
	$IdListRA[] = $row[0];

$query = "SELECT COUNT(id) FROM prList_TM;";
$result = mysqli_query($conn, $query);
$prListCountTM = mysqli_fetch_assoc($result);
$prListCountTM = $prListCountTM["COUNT(id)"];

$query2 = "SELECT number from prList_TM;";
$result2 = mysqli_query($conn,$query2);
$numberListTM = array();
while ($row = $result2->fetch_array())
	$numberListTM[] = $row[0];

$query2 = "SELECT name from prList_TM;";
$result2 = mysqli_query($conn,$query2);
$namesListTM = array();
while ($row = $result2->fetch_array())
	$namesListTM[] = $row[0];

$query2 = "SELECT id from prList_TM;";
$result2 = mysqli_query($conn,$query2);
$IdListTM = array();
while ($row = $result2->fetch_array())
	$IdListTM[] = $row[0];

$query = "SELECT COUNT(id) FROM prList_EO;";
$result = mysqli_query($conn, $query);
$prListCountEO = mysqli_fetch_assoc($result);
$prListCountEO = $prListCountEO["COUNT(id)"];

$query2 = "SELECT number from prList_EO;";
$result2 = mysqli_query($conn,$query2);
$numberListEO = array();
while ($row = $result2->fetch_array())
	$numberListEO[] = $row[0];

$query2 = "SELECT name from prList_EO;";
$result2 = mysqli_query($conn,$query2);
$namesListEO = array();
while ($row = $result2->fetch_array())
	$namesListEO[] = $row[0];

$query2 = "SELECT id from prList_EO;";
$result2 = mysqli_query($conn,$query2);
$IdListEO = array();
while ($row = $result2->fetch_array())
	$IdListEO[] = $row[0];
?>
<!doctype.html>
<html>
<head>
<title>Персональный сайт Мальцевой Веры Николаевны</title>
<meta charset=utf-8>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<<?php
if(empty($_SESSION['login'])){
	echo <<<html
		<script>
		swal("Предупреждение!", "Данный раздел доступен только авторизированным пользователям!", "warning")
		.then((value) => {
			location.replace('/index.php');
		});
		</script>
html;
}
 ?>
 <script>
 function isDelete(filename){
 	swal({
 	  title: "Вы уверены?",
 	  text: "После удаления данного файла его невозможно будет восстановить. Продолжить?",
 	  icon: "warning",
 	   buttons: ["Отмена", "OK"],
 	  dangerMode: true,
 	})
 	.then((willDelete) => {
 	  if (willDelete) {
 			document.location.href = filename;
 	  }
 	});
 }
 </script>
<script src="https://lidrekon.ru/slep/js/jquery.js"></script>
<script src="https://lidrekon.ru/slep/js/uhpv-full.min.js"></script>
</head>
<body class="bodyFon">
<div class="container">
	<?php require_once("./assets/header.php") ?>
	<div class="content">
		<div class="main">
			<div class="row">
				<div class='list_section col-xs-1 col-sm-2 col-md-2 divLittleMenu'
				onmouseover="this.style.backgroundColor='white'; this.style.boxShadow='0 0 10px rgba(0,0,0, 0.5)'; this.style.borderRadius='7px';  this.style.backgroundImage='-moz-linear-gradient(rgba(255,255,255,0),#ffffff)';  this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(129, 162, 199))';"
				onmouseout="this.style.backgroundColor='rgba(255,255,255, 0)'; this.style.boxShadow='0 0 0px rgba(255,255,255, 0)'; this.style.borderRadius='7px'; this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(211, 219, 228))';">
							<a href = "#AT" style="text-decoration: none;"><div class="parentDivForTextMenu">
								<p class="childForTextMenu h4">АТ</p>
							</div></a>
				</div>
				<div class='list_section col-xs-1 col-sm-2 col-md-2 divLittleMenu'
				onmouseover="this.style.backgroundColor='white'; this.style.boxShadow='0 0 10px rgba(0,0,0, 0.5)'; this.style.borderRadius='7px';  this.style.backgroundImage='-moz-linear-gradient(rgba(255,255,255,0),#ffffff)';  this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(129, 162, 199))';"
				onmouseout="this.style.backgroundColor='rgba(255,255,255, 0)'; this.style.boxShadow='0 0 0px rgba(255,255,255, 0)'; this.style.borderRadius='7px'; this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(211, 219, 228))';">
							<a href = "#BU" style="text-decoration: none;"><div class="parentDivForTextMenu">
								<p class="childForTextMenu h4">БУ</p>
							</div></a>
				</div>
				<div class='list_section col-xs-1 col-sm-2 col-md-2 divLittleMenu'
				onmouseover="this.style.backgroundColor='white'; this.style.boxShadow='0 0 10px rgba(0,0,0, 0.5)'; this.style.borderRadius='7px';  this.style.backgroundImage='-moz-linear-gradient(rgba(255,255,255,0),#ffffff)';  this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(129, 162, 199))';"
				onmouseout="this.style.backgroundColor='rgba(255,255,255, 0)'; this.style.boxShadow='0 0 0px rgba(255,255,255, 0)'; this.style.borderRadius='7px'; this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(211, 219, 228))';">
							<a href = "#RA" style="text-decoration: none;"><div class="parentDivForTextMenu">
								<p class="childForTextMenu h4">РА</p>
							</div></a>
				</div>
				<div class='list_section col-xs-1 col-sm-2 col-md-2 divLittleMenu'
				onmouseover="this.style.backgroundColor='white'; this.style.boxShadow='0 0 10px rgba(0,0,0, 0.5)'; this.style.borderRadius='7px';  this.style.backgroundImage='-moz-linear-gradient(rgba(255,255,255,0),#ffffff)';  this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(129, 162, 199))';"
				onmouseout="this.style.backgroundColor='rgba(255,255,255, 0)'; this.style.boxShadow='0 0 0px rgba(255,255,255, 0)'; this.style.borderRadius='7px'; this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(211, 219, 228))';">
							<a href = "#TM" style="text-decoration: none;"><div class="parentDivForTextMenu">
								<p class="childForTextMenu h4">ТМ</p>
							</div></a>
				</div>
				<div class='list_section col-xs-1 col-sm-2 col-md-2 divLittleMenu'
				onmouseover="this.style.backgroundColor='white'; this.style.boxShadow='0 0 10px rgba(0,0,0, 0.5)'; this.style.borderRadius='7px';  this.style.backgroundImage='-moz-linear-gradient(rgba(255,255,255,0),#ffffff)';  this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(129, 162, 199))';"
				onmouseout="this.style.backgroundColor='rgba(255,255,255, 0)'; this.style.boxShadow='0 0 0px rgba(255,255,255, 0)'; this.style.borderRadius='7px'; this.style.backgroundImage='linear-gradient(rgba(255,255,255,0),rgb(211, 219, 228))';">
							<a href = "#EO" style="text-decoration: none;"><div class="parentDivForTextMenu">
								<p class="childForTextMenu h4">ЭО</p>
							</div></a>
				</div>
				<<?php
				if(!empty($_GET['red_prListAT_name'])){
					$id_red = $_GET['red_prListAT_name'];
					$query = "SELECT number,name FROM prList_AT Where id={$id_red}";
					$result = mysqli_query($conn, $query);
					if($result){
						while($row = mysqli_fetch_array($result)){
						echo <<<html
						<div id="redAT" style="display:block;width:100%;" class="addOrEditDiv">
						<h3 class="textAlighInCenter">Редактирование записи группы АТ</h3>
						<form  method=post>
						<h4>Введите номер практической работы </h4>
						<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" value='{$row["number"]}' name="number" maxlength="10" required>
						<h4>Введите название практической работы </h4>
						<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" value='{$row["name"]}' name="prName" maxlength="100" required>
						<button type=submit name="deployAT" class="btn btn-default">Редактировать</button></form>
						</div>
html;
						}

						?>
						<script>
							if(document.getElementById("redAT").style.display=='block'){
								document.getElementById("addAT").style.display='none';
							}
						</script>
						<?php

						if(isset($_POST['deployAT'])){
								$number = $_POST['number'];
								$name = $_POST['prName'];
								$sql = "Update prList_AT Set number='{$number}',name='{$name}' Where id = {$id_red};";//формирование запроса
								$result = mysqli_query($conn, $sql);
								if($result){
									echo <<<html
									<script>
									swal("Успех!", "Запись была успешно редактирована", "success")
									.then((value) => {
										location.replace('/disciplines_matemat_2course.php');
									});
									</script>
html;
								}else{
									echo <<<html
									<script>
									swal("Неудача!", "Ошибка при редактировании", "error")
									.then((value) => {
										location.replace('/disciplines_matemat_2course.php');
									});
									</script>
html;
								}
					}
				}
			}


			if(!empty($_GET['red_prListBU_name'])){
				$id_red = $_GET['red_prListBU_name'];
				$query = "SELECT number,name FROM prList_BU Where id={$id_red}";
				$result = mysqli_query($conn, $query);
				if($result){
					while($row = mysqli_fetch_array($result)){
					echo <<<html
					<div id="redBU" style="display:block;width:100%;" class="addOrEditDiv">
					<h3 class="textAlighInCenter">Редактирование записи группы БУ</h3>
					<form  method=post>
					<h4>Введите номер практической работы </h4>
					<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" value='{$row["number"]}' name="number" maxlength="10" required>
					<h4>Введите название практической работы </h4>
					<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" value='{$row["name"]}' name="prName" maxlength="100" required>
					<button type=submit name="deployBU" class="btn btn-default">Редактировать</button></form>
					</div>
html;
					}

					?>
					<script>
						if(document.getElementById("redBU").style.display=='block'){
							document.getElementById("addBU").style.display='none';
						}
					</script>
					<?php

					if(isset($_POST['deployBU'])){
							$number = $_POST['number'];
							$name = $_POST['prName'];
							$sql = "Update prList_BU Set number='{$number}',name='{$name}' Where id = {$id_red};";//формирование запроса
							$result = mysqli_query($conn, $sql);
							if($result){
								echo <<<html
								<script>
								swal("Успех!", "Запись была успешно редактирована", "success")
								.then((value) => {
									location.replace('/disciplines_matemat_2course.php');
								});
								</script>
html;
							}else{
								echo <<<html
								<script>
								swal("Неудача!", "Ошибка при редактировании", "error")
								.then((value) => {
									location.replace('/disciplines_matemat_2course.php');
								});
								</script>
html;
							}
				}
			}
		}


		if(!empty($_GET['red_prListRA_name'])){
			$id_red = $_GET['red_prListRA_name'];
			$query = "SELECT number,name FROM prList_RA Where id={$id_red}";
			$result = mysqli_query($conn, $query);
			if($result){
				while($row = mysqli_fetch_array($result)){
				echo <<<html
				<div id="redRA" style="display:block;width:100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Редактирование записи группы РА</h3>
				<form  method=post>
				<h4>Введите номер практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" value='{$row["number"]}' name="number" maxlength="10" required>
				<h4>Введите название практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" value='{$row["name"]}' name="prName" maxlength="100" required>
				<button type=submit name="deployRA" class="btn btn-default">Редактировать</button></form>
				</div>
html;
				}

				?>
				<script>
					if(document.getElementById("redRA").style.display=='block'){
						document.getElementById("addRA").style.display='none';
					}
				</script>
				<?php

				if(isset($_POST['deployRA'])){
						$number = $_POST['number'];
						$name = $_POST['prName'];
						$sql = "Update prList_RA Set number='{$number}',name='{$name}' Where id = {$id_red};";//формирование запроса
						$result = mysqli_query($conn, $sql);
						if($result){
							echo <<<html
							<script>
							swal("Успех!", "Запись была успешно редактирована", "success")
							.then((value) => {
								location.replace('/disciplines_matemat_2course.php');
							});
							</script>
html;
						}else{
							echo <<<html
							<script>
							swal("Неудача!", "Ошибка при редактировании", "error")
							.then((value) => {
								location.replace('/disciplines_matemat_2course.php');
							});
							</script>
html;
						}
			}
		}
	}

	if(!empty($_GET['red_prListTM_name'])){
		$id_red = $_GET['red_prListTM_name'];
		$query = "SELECT number,name FROM prList_TM Where id={$id_red}";
		$result = mysqli_query($conn, $query);
		if($result){
			while($row = mysqli_fetch_array($result)){
			echo <<<html
			<div id="redTM" style="display:block;width:100%;" class="addOrEditDiv">
			<h3 class="textAlighInCenter">Редактирование записи группы ТМ</h3>
			<form  method=post>
			<h4>Введите номер практической работы </h4>
			<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" value='{$row["number"]}' name="number" maxlength="10" required>
			<h4>Введите название практической работы </h4>
			<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" value='{$row["name"]}' name="prName" maxlength="100" required>
			<button type=submit name="deployTM" class="btn btn-default">Редактировать</button></form>
			</div>
html;
			}

			?>
			<script>
				if(document.getElementById("redTM").style.display=='block'){
					document.getElementById("addTM").style.display='none';
				}
			</script>
			<?php

			if(isset($_POST['deployTM'])){
					$number = $_POST['number'];
					$name = $_POST['prName'];
					$sql = "Update prList_TM Set number='{$number}',name='{$name}' Where id = {$id_red};";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно редактирована", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при редактировании", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
		}
	}
}

if(!empty($_GET['red_prListEO_name'])){
	$id_red = $_GET['red_prListEO_name'];
	$query = "SELECT number,name FROM prList_EO Where id={$id_red}";
	$result = mysqli_query($conn, $query);
	if($result){
		while($row = mysqli_fetch_array($result)){
		echo <<<html
		<div id="redEO" style="display:block;width:100%;" class="addOrEditDiv">
		<h3 class="textAlighInCenter">Редактирование записи группы ТМ</h3>
		<form  method=post>
		<h4>Введите номер практической работы </h4>
		<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" value='{$row["number"]}' name="number" maxlength="10" required>
		<h4>Введите название практической работы </h4>
		<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" value='{$row["name"]}' name="prName" maxlength="100" required>
		<button type=submit name="deployEO" class="btn btn-default">Редактировать</button></form>
		</div>
html;
		}

		?>
		<script>
			if(document.getElementById("redEO").style.display=='block'){
				document.getElementById("addEO").style.display='none';
			}
		</script>
		<?php

		if(isset($_POST['deployEO'])){
				$number = $_POST['number'];
				$name = $_POST['prName'];
				$sql = "Update prList_EO Set number='{$number}',name='{$name}' Where id = {$id_red};";//формирование запроса
				$result = mysqli_query($conn, $sql);
				if($result){
					echo <<<html
					<script>
					swal("Успех!", "Запись была успешно редактирована", "success")
					.then((value) => {
						location.replace('/disciplines_matemat_2course.php');
					});
					</script>
html;
				}else{
					echo <<<html
					<script>
					swal("Неудача!", "Ошибка при редактировании", "error")
					.then((value) => {
						location.replace('/disciplines_matemat_2course.php');
					});
					</script>
html;
				}
	}
}
}

				 ?>
				<div class='list_section col-xs-6 col-sm-12 col-md-12 headerText' id='AT'>
						<h2 class="textAlighInCenter display-4">23.02.02 Автомобиле- и тракторостроение</h2>
				</div>
				<?php






				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление рабочей программы группы АТ </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addRpAtBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addRpAtBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_AT_to_RP,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_AT_RP_name'])){
					$del_name=$_GET['del_AT_RP_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_AT_to_RP,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Рабочие программы</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Рабочие программы</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_AT_to_RP);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_AT_RP_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
					</tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление контрольно-оценочного средства группы АТ </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addKosAtBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addKosAtBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_AT_to_KOS,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_AT_KOS_name'])){
					$del_name=$_GET['del_AT_KOS_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_AT_to_KOS,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
				  <thead>
				    <tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Контрольно-оценочные средства</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Контрольно-оценочные средства</th>
html;
							}
							 ?>
				    </tr>
				  </thead>
				  <tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_AT_to_KOS);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_AT_KOS_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
				  </tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" id="addAT" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление практической работы в список практических работ группы АТ</h3>
				<form  method=post>
				<h4>Введите номер практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" name="number" maxlength="10" required>
				<h4>Введите название практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" name="prName" maxlength="100" required>
				<button type=submit name="addPrListATBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addPrListATBTN'])){
					$number = $_POST['number'];
					$name = $_POST['prName'];
					$sql = "Insert Into prList_AT (number,name) Values ('{$number}','$name');";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){

						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно добавлена", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при добавлении", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
						}
				}

				if(!empty($_GET['del_prListAT_name'])){
					$id_del=$_GET['del_prListAT_name'];

					$sql = "Delete from prList_AT  Where id = {$id_del}";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно удалена", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}



				 ?>
				<table class="table table-hover adaptiveTable">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="4">Список практических работ</th>
html;
							}else{
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Список практических работ</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
					if($_SESSION['login'] == 'admin'){
						for ($i=0;$i<$prListCountAT;$i++){
						echo <<<html
						<tr style="width: 100%;">
							<td class="tenPercentInTable" style="vertical-align: middle;"><p class="prName">{$numberListAT[$i]}</p></td>
							<td><p class="text_in_tableRowNonLink">{$namesListAT[$i]}</p></td>
							<td class="text_in_tableRow widthTenPercent"><a href="disciplines_matemat_2course.php?red_prListAT_name={$IdListAT[$i]}">Редактировать</a></td>
							<td class="text_in_tableRow widthTenPercent"><a style="cursor:pointer" onclick="isDelete('?del_prListAT_name={$IdListAT[$i]}')">Удалить</a></td>
						</tr>
html;
				}
					}else{
						for ($i=0;$i<$prListCountAT;$i++){
						echo <<<html
						<tr style="width: 100%;">
							<td class="tenPercentInTable" style="vertical-align: middle;"><p class="prName">{$numberListAT[$i]}</p></td>
							<td><p class="text_in_tableRowNonLink">{$namesListAT[$i]}</p></td>
						</tr>
html;
				}
					}

						 ?>
					</tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление текущего контроля группы АТ </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addCurCtrlAtBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addCurCtrlAtBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_AT_to_CurrentControl,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_AT_CurCTRL_name'])){
					$del_name=$_GET['del_AT_CurCTRL_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_AT_to_CurrentControl,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Текущий контроль</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Текущий контроль</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_AT_to_CurrentControl);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_AT_CurCTRL_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
					</tbody>
				</table>

				<div class='list_section col-xs-6 col-sm-12 col-md-12 headerText' id="BU">
						<h2 class="textAlighInCenter display-4">38.02.01 Экономика и бухгалтерский учет</h2>
				</div>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление рабочей программы группы БУ </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addRpBuBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addRpBuBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_BU_to_RP,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_BU_RP_name'])){
					$del_name=$_GET['del_BU_RP_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_BU_to_RP,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Рабочие программы</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Рабочие программы</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_BU_to_RP);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_BU_RP_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
					</tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление контрольно-оценочного средства группы БУ </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addKosBuBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addKosBuBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_BU_to_KOS,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_BU_KOS_name'])){
					$del_name=$_GET['del_BU_KOS_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_BU_to_KOS,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
				  <thead>
				    <tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Контрольно-оценочные средства</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Контрольно-оценочные средства</th>
html;
							}
							 ?>
				    </tr>
				  </thead>
				  <tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_BU_to_KOS);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_BU_KOS_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
				  </tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" id="addBU" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление практической работы в список практических работ группы БУ</h3>
				<form  method=post>
				<h4>Введите номер практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" name="number" maxlength="10" required>
				<h4>Введите название практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" name="prName" maxlength="100" required>
				<button type=submit name="addPrListBUBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addPrListBUBTN'])){
					$number = $_POST['number'];
					$name = $_POST['prName'];
					$sql = "Insert Into prList_BU (number,name) Values ('{$number}','$name');";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){

						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно добавлена", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при добавлении", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
						}
				}

				if(!empty($_GET['del_prListBU_name'])){
					$id_del=$_GET['del_prListBU_name'];

					$sql = "Delete from prList_BU  Where id = {$id_del}";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно удалена", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}

				if(!empty($_GET['red_prListBU_name'])){
					$id_red = $_GET['red_prListBU_name'];
					$query = "SELECT number,name FROM prList_BU Where id={$id_red}";
					$result = mysqli_query($conn, $query);
					if($result){
						while($row = mysqli_fetch_array($result)){
						echo <<<html
						<div id="redBU" style="display:block;width:100%;" class="addOrEditDiv">
						<h3 class="textAlighInCenter">Редактирование записи группы БУ</h3>
						<form  method=post>
						<h4>Введите номер практической работы </h4>
						<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" value='{$row["number"]}' name="number" maxlength="10" required>
						<h4>Введите название практической работы </h4>
						<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" value='{$row["name"]}' name="prName" maxlength="100" required>
						<button type=submit name="deployBU" class="btn btn-default">Редактировать</button></form>
						</div>
html;
						}

						?>
						<script>
							if(document.getElementById("redBU").style.display=='block'){
								document.getElementById("addBU").style.display='none';
							}
						</script>
						<?php

						if(isset($_POST['deployBU'])){
								$number = $_POST['number'];
								$name = $_POST['prName'];
								$sql = "Update prList_BU Set number='{$number}',name='{$name}' Where id = {$id_red};";//формирование запроса
								$result = mysqli_query($conn, $sql);
								if($result){
									echo <<<html
									<script>
									swal("Успех!", "Запись была успешно редактирована", "success")
									.then((value) => {
										location.replace('/disciplines_matemat_2course.php');
									});
									</script>
html;
								}else{
									echo <<<html
									<script>
									swal("Неудача!", "Ошибка при редактировании", "error")
									.then((value) => {
										location.replace('/disciplines_matemat_2course.php');
									});
									</script>
html;
								}
					}
				}
			}

				 ?>
				<table class="table table-hover adaptiveTable">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="4">Список практических работ</th>
html;
							}else{
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Список практических работ</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
					if($_SESSION['login'] == 'admin'){
						for ($i=0;$i<$prListCountBU;$i++){
						echo <<<html
						<tr style="width: 100%;">
							<td class="tenPercentInTable" style="vertical-align: middle;"><p class="prName">{$numberListBU[$i]}</p></td>
							<td><p class="text_in_tableRowNonLink">{$namesListBU[$i]}</p></td>
							<td class="text_in_tableRow widthTenPercent"><a href="disciplines_matemat_2course.php?red_prListBU_name={$IdListBU[$i]}">Редактировать</a></td>
							<td class="text_in_tableRow widthTenPercent"><a style="cursor:pointer" onclick="isDelete('?del_prListBU_name={$IdListBU[$i]}')">Удалить</a></td>
						</tr>
html;
				}
					}else{
						for ($i=0;$i<$prListCountBU;$i++){
						echo <<<html
						<tr style="width: 100%;">
							<td class="tenPercentInTable" style="vertical-align: middle;"><p class="prName">{$numberListBU[$i]}</p></td>
							<td><p class="text_in_tableRowNonLink">{$namesListBU[$i]}</p></td>
						</tr>
html;
				}
					}

						 ?>
					</tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление текущего контроля группы БУ </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addCurCtrlBuBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addCurCtrlBuBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_BU_to_CurrentControl,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_BU_CurCTRL_name'])){
					$del_name=$_GET['del_BU_CurCTRL_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_BU_to_CurrentControl,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Текущий контроль</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Текущий контроль</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_BU_to_CurrentControl);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_BU_CurCTRL_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
					</tbody>
				</table>

				<div class='list_section col-xs-6 col-sm-12 col-md-12 headerText'  id="RA">
						<h2 class="textAlighInCenter display-4">23.02.03 Техническое обслуживание и ремонт автомобильного транспорта</h2>
				</div>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление рабочей программы группы РА </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addRpRaBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addRpRaBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_RA_to_RP,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_RA_RP_name'])){
					$del_name=$_GET['del_RA_RP_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_RA_to_RP,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Рабочие программы</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Рабочие программы</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_RA_to_RP);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_RA_RP_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
					</tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление контрольно-оценочного средства группы РА </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addKosRaBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addKosRaBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_RA_to_KOS,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_RA_KOS_name'])){
					$del_name=$_GET['del_RA_KOS_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_RA_to_KOS,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
				  <thead>
				    <tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Контрольно-оценочные средства</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Контрольно-оценочные средства</th>
html;
							}
							 ?>
				    </tr>
				  </thead>
				  <tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_RA_to_KOS);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_RA_KOS_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
				  </tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" id="addRA" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление практической работы в список практических работ группы РА</h3>
				<form  method=post>
				<h4>Введите номер практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" name="number" maxlength="10" required>
				<h4>Введите название практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" name="prName" maxlength="100" required>
				<button type=submit name="addPrListRABTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addPrListRABTN'])){
					$number = $_POST['number'];
					$name = $_POST['prName'];
					$sql = "Insert Into prList_RA (number,name) Values ('{$number}','$name');";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){

						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно добавлена", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при добавлении", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
						}
				}

				if(!empty($_GET['del_prListRA_name'])){
					$id_del=$_GET['del_prListRA_name'];

					$sql = "Delete from prList_RA  Where id = {$id_del}";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно удалена", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}


				 ?>
				<table class="table table-hover adaptiveTable">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="4">Список практических работ</th>
html;
							}else{
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Список практических работ</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
					if($_SESSION['login'] == 'admin'){
						for ($i=0;$i<$prListCountRA;$i++){
						echo <<<html
						<tr style="width: 100%;">
							<td class="tenPercentInTable" style="vertical-align: middle;"><p class="prName">{$numberListRA[$i]}</p></td>
							<td><p class="text_in_tableRowNonLink">{$namesListRA[$i]}</p></td>
							<td class="text_in_tableRow widthTenPercent"><a href="disciplines_matemat_2course.php?red_prListRA_name={$IdListRA[$i]}">Редактировать</a></td>
							<td class="text_in_tableRow widthTenPercent"><a style="cursor:pointer" onclick="isDelete('?del_prListRA_name={$IdListRA[$i]}')">Удалить</a></td>
						</tr>
html;
				}
					}else{
						for ($i=0;$i<$prListCountRA;$i++){
						echo <<<html
						<tr style="width: 100%;">
							<td class="tenPercentInTable" style="vertical-align: middle;"><p class="prName">{$numberListRA[$i]}</p></td>
							<td><p class="text_in_tableRowNonLink">{$namesListRA[$i]}</p></td>
						</tr>
html;
				}
					}

						 ?>
					</tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление текущего контроля группы РА </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addCurCtrlRaBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addCurCtrlRaBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_RA_to_CurrentControl,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_RA_CurCTRL_name'])){
					$del_name=$_GET['del_RA_CurCTRL_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_RA_to_CurrentControl,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Текущий контроль</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Текущий контроль</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_RA_to_CurrentControl);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_RA_CurCTRL_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
					</tbody>
				</table>

				<div class='list_section col-xs-6 col-sm-12 col-md-12 headerText' id="TM">
						<h2 class="textAlighInCenter display-4">15.02.08 Технология машиностроения</h2>
				</div>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление рабочей программы группы ТМ </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addRpTmBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addRpTmBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_TM_to_RP,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_TM_RP_name'])){
					$del_name=$_GET['del_TM_RP_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_TM_to_RP,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Рабочие программы</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Рабочие программы</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_TM_to_RP);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_TM_RP_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
					</tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление контрольно-оценочного средства группы ТМ </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addKosTmBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addKosTmBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_TM_to_KOS,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_TM_KOS_name'])){
					$del_name=$_GET['del_TM_KOS_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_TM_to_KOS,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Контрольно-оценочные средства</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Контрольно-оценочные средства</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_TM_to_KOS);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_TM_KOS_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
					</tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" id="addTM" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление практической работы в список практических работ группы ТМ</h3>
				<form  method=post>
				<h4>Введите номер практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" name="number" maxlength="10" required>
				<h4>Введите название практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" name="prName" maxlength="100" required>
				<button type=submit name="addPrListTMBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addPrListTMBTN'])){
					$number = $_POST['number'];
					$name = $_POST['prName'];
					$sql = "Insert Into prList_TM (number,name) Values ('{$number}','$name');";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){

						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно добавлена", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при добавлении", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
						}
				}

				if(!empty($_GET['del_prListTM_name'])){
					$id_del=$_GET['del_prListTM_name'];

					$sql = "Delete from prList_TM  Where id = {$id_del}";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно удалена", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}


				 ?>
				<table class="table table-hover adaptiveTable">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="4">Список практических работ</th>
html;
							}else{
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Список практических работ</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
					if($_SESSION['login'] == 'admin'){
						for ($i=0;$i<$prListCountTM;$i++){
						echo <<<html
						<tr style="width: 100%;">
							<td class="tenPercentInTable" style="vertical-align: middle;"><p class="prName">{$numberListTM[$i]}</p></td>
							<td><p class="text_in_tableRowNonLink">{$namesListTM[$i]}</p></td>
							<td class="text_in_tableRow widthTenPercent"><a href="disciplines_matemat_2course.php?red_prListTM_name={$IdListTM[$i]}">Редактировать</a></td>
							<td class="text_in_tableRow widthTenPercent"><a style="cursor:pointer" onclick="isDelete('?del_prListTM_name={$IdListTM[$i]}')">Удалить</a></td>
						</tr>
html;
				}
					}else{
						for ($i=0;$i<$prListCountTM;$i++){
						echo <<<html
						<tr style="width: 100%;">
							<td class="tenPercentInTable" style="vertical-align: middle;"><p class="prName">{$numberListTM[$i]}</p></td>
							<td><p class="text_in_tableRowNonLink">{$namesListTM[$i]}</p></td>
						</tr>
html;
				}
					}

						 ?>
					</tbody>
				</table>



				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление текущего контроля группы ТМ </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addCurCtrlTmBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addCurCtrlTmBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_TM_to_CurrentControl,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_TM_CurCTRL_name'])){
					$del_name=$_GET['del_TM_CurCTRL_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_TM_to_CurrentControl,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Текущий контроль</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Текущий контроль</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_TM_to_CurrentControl);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_TM_CurCTRL_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
					</tbody>
				</table>

				<div class='list_section col-xs-6 col-sm-12 col-md-12 headerText' id="EO">
						<h2 class="textAlighInCenter display-4">"13.02.11 Техническая эксплуатация и обслуживание электрического и электромеханического оборудования"</h2>
				</div>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление рабочей программы группы ЭО </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addRpEoBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addRpEoBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_EO_to_RP,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_EO_RP_name'])){
					$del_name=$_GET['del_EO_RP_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_EO_to_RP,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Рабочие программы</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Рабочие программы</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_EO_to_RP);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_EO_RP_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
					</tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление контрольно-оценочного средства группы ЭО </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addKosEoBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addKosEoBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_EO_to_KOS,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_EO_KOS_name'])){
					$del_name=$_GET['del_EO_KOS_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_EO_to_KOS,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Контрольно-оценочные средства</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Контрольно-оценочные средства</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_EO_to_KOS);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_EO_KOS_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
					</tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" id="addEO" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление практической работы в список практических работ группы ЭО</h3>
				<form  method=post>
				<h4>Введите номер практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" name="number" maxlength="10" required>
				<h4>Введите название практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" name="prName" maxlength="100" required>
				<button type=submit name="addPrListEOBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addPrListEOBTN'])){
					$number = $_POST['number'];
					$name = $_POST['prName'];
					$sql = "Insert Into prList_EO (number,name) Values ('{$number}','$name');";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){

						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно добавлена", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при добавлении", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
						}
				}

				if(!empty($_GET['del_prListEO_name'])){
					$id_del=$_GET['del_prListEO_name'];

					$sql = "Delete from prList_EO  Where id = {$id_del}";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно удалена", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}


				 ?>
				<table class="table table-hover adaptiveTable">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="4">Список практических работ</th>
html;
							}else{
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Список практических работ</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
					if($_SESSION['login'] == 'admin'){
						for ($i=0;$i<$prListCountEO;$i++){
						echo <<<html
						<tr style="width: 100%;">
							<td class="tenPercentInTable" style="vertical-align: middle;"><p class="prName">{$numberListEO[$i]}</p></td>
							<td><p class="text_in_tableRowNonLink">{$namesListEO[$i]}</p></td>
							<td class="text_in_tableRow widthTenPercent"><a href="disciplines_matemat_2course.php?red_prListEO_name={$IdListEO[$i]}">Редактировать</a></td>
							<td class="text_in_tableRow widthTenPercent"><a style="cursor:pointer" onclick="isDelete('?del_prListEO_name={$IdListEO[$i]}')">Удалить</a></td>
						</tr>
html;
				}
					}else{
						for ($i=0;$i<$prListCountEO;$i++){
						echo <<<html
						<tr style="width: 100%;">
							<td class="tenPercentInTable" style="vertical-align: middle;"><p class="prName">{$numberListEO[$i]}</p></td>
							<td><p class="text_in_tableRowNonLink">{$namesListEO[$i]}</p></td>
						</tr>
html;
				}
					}

						 ?>
					</tbody>
				</table>
				<?php
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление текущего контроля группы ЭО </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addCurCtrlEoBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addCurCtrlEoBTN'])){
					$uploaddir = './temp/';//назначение дириктории временного хранения файла
					//Получение пути до файла и его копирование
					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];
					// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
					$response = YandexAddFiles($path_EO_to_CurrentControl,$file,$filename);
					if($response == "Файл успешно загружен"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success");
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error");
						</script>
html;
					}
				}

				if(!empty($_GET['del_EO_CurCTRL_name'])){
					$del_name=$_GET['del_EO_CurCTRL_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_EO_to_CurrentControl,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_2course.php');
						});
						</script>
html;
					}
				}
				 ?>
				<table class="table table-hover">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Текущий контроль</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Текущий контроль</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_EO_to_CurrentControl);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_EO_CurCTRL_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
								</tr>
html;
							}
				}
						 ?>
					</tbody>
				</table>
				</div>
			</div>
  	</div>
	</div>
</body>
</html>
