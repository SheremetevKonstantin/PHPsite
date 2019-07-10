<?php
session_start();
include 'YandexDrive.php';
require_once("./assets/conn.php");

//AT
$path_to_KOS = '/Студентам/Численные и математические методы/Численные методы/КОС/';
$path_to_RP = '/Студентам/Численные и математические методы/Численные методы/РП/';
$path_to_PR = '/Студентам/Численные и математические методы/Численные методы/ПР/';
$path_to_CurrentControl = '/Студентам/Численные и математические методы/Численные методы/Текущий контроль/';

$query = "SELECT COUNT(id) FROM prList_DigitMetods;";
$result = mysqli_query($conn, $query);
$prListCount = mysqli_fetch_assoc($result);
$prListCount = $prListCount["COUNT(id)"];

$query2 = "SELECT number from prList_DigitMetods;";
$result2 = mysqli_query($conn,$query2);
$numberList = array();
while ($row = $result2->fetch_array())
	$numberList[] = $row[0];

$query2 = "SELECT name from prList_DigitMetods;";
$result2 = mysqli_query($conn,$query2);
$namesList = array();
while ($row = $result2->fetch_array())
	$namesList[] = $row[0];

$query2 = "SELECT id from prList_DigitMetods;";
$result2 = mysqli_query($conn,$query2);
$IdList = array();
while ($row = $result2->fetch_array())
	$IdList[] = $row[0];
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
						<h2 class="textAlighInCenter display-4">09.02.03 Программирование в компьютерных системах</h2>
				</div>
				<?php
				if(!empty($_GET['red_prList_name'])){
					$id_red = $_GET['red_prList_name'];
					$query = "SELECT number,name FROM prList_DigitMetods Where id={$id_red}";
					$result = mysqli_query($conn, $query);
					if($result){
						while($row = mysqli_fetch_array($result)){
						echo <<<html
						<div id="red" style="display:block;width:100%;" class="addOrEditDiv">
						<h3 class="textAlighInCenter">Редактирование записи названия практической работы</h3>
						<form  method=post>
						<h4>Введите номер практической работы </h4>
						<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" value='{$row["number"]}' name="number" maxlength="10" required>
						<h4>Введите название практической работы </h4>
						<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" value='{$row["name"]}' name="prName" maxlength="100" required>
						<button type=submit name="deploy" class="btn btn-default">Редактировать</button></form>
						</div>
html;
						}

						if(isset($_POST['deploy'])){
								$number = $_POST['number'];
								$name = $_POST['prName'];
								$sql = "Update prList_DigitMetods Set number='{$number}',name='{$name}' Where id = {$id_red};";//формирование запроса
								$result = mysqli_query($conn, $sql);
								if($result){
									echo <<<html
									<script>
									swal("Успех!", "Запись была успешно редактирована", "success")
									.then((value) => {
										location.replace('/disciplines_digit_metods.php');
									});
									</script>
html;
								}else{
									echo <<<html
									<script>
									swal("Неудача!", "Ошибка при редактировании", "error")
									.then((value) => {
										location.replace('/disciplines_digit_metods.php');
									});
									</script>
html;
								}
					}
				}
			}


				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление рабочей программы </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addRpBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addRpBTN'])){
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
					$response = YandexAddFiles($path_to_RP,$file,$filename);
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

				if(!empty($_GET['del_RP_name'])){
					$del_name=$_GET['del_RP_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_to_RP,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_digit_metods.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_digit_metods.php');
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
						$res = YandexGetFiles($path_to_RP);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_RP_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
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
				<h3 class="textAlighInCenter">Добавление контрольно-оценочного средства </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addKosBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addKosBTN'])){
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
					$response = YandexAddFiles($path_to_KOS,$file,$filename);
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

				if(!empty($_GET['del_KOS_name'])){
					$del_name=$_GET['del_KOS_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_to_KOS,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_digit_metods.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_digit_metods.php');
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
						$res = YandexGetFiles($path_to_KOS);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_KOS_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
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
				<div style="width: 100%;" id="add" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление практической работы в список практических работ</h3>
				<form  method=post>
				<h4>Введите номер практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" name="number" maxlength="10" required>
				<h4>Введите название практической работы </h4>
				<input type="text" style="height:50px;font-size: 2em;margin-bottom:5%;    border: solid;width: 100%;" name="prName" maxlength="100" required>
				<button type=submit name="addPrListBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addPrListBTN'])){
					$number = $_POST['number'];
					$name = $_POST['prName'];
					$sql = "Insert Into prList_DigitMetods (number,name) Values ('{$number}','$name');";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){

						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно добавлена", "success")
						.then((value) => {
							location.replace('/disciplines_digit_metods.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при добавлении", "error")
						.then((value) => {
							location.replace('/disciplines_digit_metods.php');
						});
						</script>
html;
						}
				}

				if(!empty($_GET['del_prList_name'])){
					$id_del=$_GET['del_prList_name'];

					$sql = "Delete from prList_DigitMetods  Where id = {$id_del}";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно удалена", "success")
						.then((value) => {
							location.replace('/disciplines_digit_metods.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/disciplines_digit_metods.php');
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
						for ($i=0;$i<$prListCount;$i++){
						echo <<<html
						<tr style="width: 100%;">
							<td class="tenPercentInTable" style="vertical-align: middle;"><p class="prName">{$numberList[$i]}</p></td>
							<td><p class="text_in_tableRowNonLink">{$namesList[$i]}</p></td>
							<td class="text_in_tableRow widthTenPercent"><a href="disciplines_digit_metods.php?red_prList_name={$IdList[$i]}">Редактировать</a></td>
							<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_prList_name={$IdList[$i]}')" style="cursor:pointer">Удалить</a></td>
						</tr>
html;
				}
					}else{
						for ($i=0;$i<$prListCount;$i++){
						echo <<<html
						<tr style="width: 100%;">
							<td class="tenPercentInTable" style="vertical-align: middle;"><p class="prName">{$numberList[$i]}</p></td>
							<td style="border-right:double;"><p class="text_in_tableRowNonLink">{$namesList[$i]}</p></td>
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
				<h3 class="textAlighInCenter">Добавление практической работы </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addPrBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addPrBTN'])){
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
					$response = YandexAddFiles($path_to_PR,$file,$filename);
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

				if(!empty($_GET['del_PR_name'])){
					$del_name=$_GET['del_PR_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_to_PR,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_digit_metods.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_digit_metods.php');
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
							<th scope="col" class="h2 tableHeader tableHeader" style="text-align:center;" colspan="3">Практические работы</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader tableHeader" style="text-align:center;" colspan="2">Практические работы</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody style="border:double">
						<?php
						$res = YandexGetFiles($path_to_PR);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_PR_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
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
				<h3 class="textAlighInCenter">Добавление текущего контроля </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addCurCtrlBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addCurCtrlBTN'])){
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
					$response = YandexAddFiles($path_to_CurrentControl,$file,$filename);
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

				if(!empty($_GET['del_CurCtrl_name'])){
					$del_name=$_GET['del_CurCtrl_name'];
					// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

					$response = YandexDelFiles($path_to_CurrentControl,$del_name);
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/disciplines_digit_metods.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_digit_metods.php');
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
						$res = YandexGetFiles($path_to_CurrentControl);//получение файлов с яндекса
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_CurCtrl_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
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
