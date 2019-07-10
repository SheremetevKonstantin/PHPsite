<?php
session_start();
?>
<!doctype.html>
<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require_once("./assets/conn.php");

include 'YandexDrive.php';
$pathDocPCK = '/ПЦК/Документы ПЦК ЕНД/';
$pathOtchetEvents = '/ПЦК/Отчеты по мероприятиям предметной недели/';
$pathMetodWork = '/ПЦК/Методическая работа членов комиссии/';
$pathStudentProjects = '/ПЦК/Методическая работа членов комиссии/Проектная деятельность студентов/';


$query = "SELECT COUNT(id) FROM PCK_teachers;";
$result = mysqli_query($conn, $query);
$PCKteachersCount = mysqli_fetch_assoc($result);
$PCKteachersCount = $PCKteachersCount["COUNT(id)"];

$query2 = "SELECT fio from PCK_teachers;";
$result2 = mysqli_query($conn,$query2);
$fioArray = array();
while ($row = $result2->fetch_array())
	$fioArray[] = $row[0];

$query3 = "SELECT category from PCK_teachers;";
$result3 = mysqli_query($conn,$query3);
$categoryArray = array();
while ($row = $result3->fetch_array())
  $categoryArray[] = $row[0];

$query4 = "SELECT attestation_date from PCK_teachers;";
$result4 = mysqli_query($conn,$query4);
$attestationArray = array();
while ($row = $result4->fetch_array())
  $attestationArray[] = $row[0];

$query5 = "SELECT disciplines from PCK_teachers;";
$result5 = mysqli_query($conn,$query5);
$disciplinesArray = array();
while ($row = $result5->fetch_array())
  $disciplinesArray[] = $row[0];

$query5 = "SELECT id from PCK_teachers;";
$result5 = mysqli_query($conn,$query5);
$teachersIdList = array();
while ($row = $result5->fetch_array())
  $teachersIdList[] = $row[0];
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
<title>Персональный сайт Мальцевой Веры Николаевны</title>
<meta charset=utf-8>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<<?php
if(empty($_SESSION['login'])){
	echo <<<html
		<script>
		swal("Предупреждение!", "Данный раздел доступен только авторизированным пользователям!", "warning")
		.then((value) => {
			location.replace('/index.html');
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
				<?php

					if($_SESSION['login'] == 'admin'){
					echo <<<html
					<div style="width:100%;" id="add" class="addOrEditDiv">
					<h3 class="textAlighInCenter">Добавление записи </h3>
					<form  method=post enctype=multipart/form-data>
					<h4>ФИО</h4>
					<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" name="fio" maxlength="100"></input>
					<h4>Категория</h4>
					<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" name="category" maxlength="50"></input>
					<h4>Дата атестации</h4>
					<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" name="date" maxlength="50"></input>
					<h4>Преподаваемые дисциплины</h4>
					<textarea class="editTextarea" name="textarea" maxlength="255"></textarea>
					<button type=submit name="addBTN" class="btn btn-default">Добавить</button></form>
					</div>
html;
					}

				if(isset($_POST['addBTN'])){
						$fio = $_POST['fio'];
						$category = $_POST['category'];
						$attestation_date = $_POST['date'];
						$disciplines = $_POST['textarea'];
						$sql = "Insert into PCK_teachers (fio,category,attestation_date,disciplines) values ('$fio','$category','$attestation_date','$disciplines');";//формирование запроса
						$result = mysqli_query($conn, $sql);
						if($result){
							echo <<<html
							<script>
							swal("Успех!", "Запись была успешно добавлена", "success")
							.then((value) => {
								location.replace('/PCK.php');
							});
							</script>
html;
						}else{
							echo <<<html
							<script>
							swal("Неудача!", "Ошибка при добавлении", "error")
							.then((value) => {
								location.replace('/PCK.php');
							});
							</script>
html;
						}
				}

					if(!empty($_GET['TeacherRed_id'])){
						$id_red = $_GET['TeacherRed_id'];
						$query = "SELECT fio,category,attestation_date,disciplines FROM PCK_teachers Where id={$id_red}";
						$result = mysqli_query($conn, $query);
						if($result){
							while($row = mysqli_fetch_array($result)){
							echo <<<html
							<div id="red" style="display:block;width:100%;" class="addOrEditDiv">
							<h3 class="textAlighInCenter">Редактирование записи </h3>
							<form  method=post enctype=multipart/form-data>
							<h4>ФИО</h4>
							<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" value='{$row["fio"]}' name="fio" maxlength="100"></input>
							<h4>Категория</h4>
							<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" value='{$row["category"]}' name="category" maxlength="50"></input>
							<h4>Дата атестации</h4>
							<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" value='{$row["attestation_date"]}' name="date" maxlength="50"></input>
							<h4>Преподаваемые дисциплины</h4>
							<textarea class="editTextarea" name="textarea" maxlength="255">{$row["disciplines"]}</textarea>
							<button type=submit name="deploy" class="btn btn-default">Редактировать</button></form>
							</div>
html;
							}

							?>
							<script>
								if(document.getElementById("red").style.display=='block'){
									document.getElementById("add").style.display='none';
								}
							</script>
							<?php

							if(isset($_POST['deploy'])){
								$fio = $_POST['fio'];
								$category = $_POST['category'];
								$attestation_date = $_POST['date'];
								$disciplines = $_POST['textarea'];
									$sql = "Update PCK_teachers Set fio = '{$fio}',category = '$category',attestation_date = '{$attestation_date}',disciplines = '$disciplines'  Where id = {$id_red}";//формирование запроса
									$result = mysqli_query($conn, $sql);
									if($result){
										echo <<<html
										<script>
										swal("Успех!", "Запись была успешно редактирована", "success")
										.then((value) => {
											location.replace('/PCK.php');
										});
										</script>
html;
									}else{
										echo <<<html
										<script>
										swal("Неудача!", "Ошибка при редактировании", "error")
										.then((value) => {
											location.replace('/PCK.php');
										});
										</script>
html;
									}
						}
					}
				}
					if(!empty($_GET['TeacherDel_id'])){
						$id_del = $_GET['TeacherDel_id'];
						$sql = "Delete from PCK_teachers  Where id = {$id_del}";//формирование запроса
						$result = mysqli_query($conn, $sql);
						if($result){
							echo <<<html
							<script>
							swal("Успех!", "Запись была успешно удалена", "success")
							.then((value) => {
								location.replace('/PCK.php');
							});
							</script>
html;
						}else{
							echo <<<html
							<script>
							swal("Неудача!", "Ошибка при удалении", "error")
							.then((value) => {
								location.replace('/PCK.php');
							});
							</script>
html;
						}
					}
				 ?>
				<table class="table table-hover table-bordered adaptiveTable">
					<thead>
						<tr>
							<?php
							if($_SESSION['login'] == 'admin'){
							echo <<<html
							<th scope="col" class="PCKheaderText tableHeader" colspan="7" style="text-align:center;">Список комиссии естественно - научных дисциплин</th>
html;
							}else{
							echo <<<html
							<th scope="col" class="PCKheaderText tableHeader" colspan="5" style="text-align:center;">Список комиссии естественно - научных дисциплин</th>
html;
							}
							 ?>
						</tr>
					</thead>
					<tbody>

						<?php
						if($_SESSION['login'] == 'admin'){
							echo <<<html
							<tr>
								<th scope="row" style="text-align: center;vertical-align: middle;">Номер п/п</th>
								<td style="font-weight: bold;text-align: center;vertical-align: middle;">ФИО</td>
								<td style="font-weight: bold;text-align: center;vertical-align: middle;">Категория</td>
								<td style="font-weight: bold;text-align: center;vertical-align: middle;">Дата атестации</td>
								<td style="font-weight: bold;text-align: center;vertical-align: middle;">Преподаваемые дисциплины</td>
								<td style="font-weight: bold;text-align: center;vertical-align: middle;">Редактирование</td>
								<td style="font-weight: bold;text-align: center;vertical-align: middle;">Удаление</td>
							</tr>
html;
							for($i = 0; $i < $PCKteachersCount; $i++){
								$number = $i + 1;
								echo <<<html
									<tr>
										<th scope="row">{$number}</th>
										<td style="font-weight: bold;">{$fioArray[$i]}</td>
										<td>{$categoryArray[$i]}</td>
										<td>{$attestationArray[$i]}</td>
										<td>{$disciplinesArray[$i]}</td>
										<td style="text-align:center;"><a href="\PCK.php?TeacherRed_id={$teachersIdList[$i]}">Редактировать</a></td>
										<td style="text-align:center;"><a onclick="isDelete('?TeacherDel_id={$teachersIdList[$i]}')" style="cursor:pointer;">Удалить</a></td>
									</tr>
html;
							}
						}else{
							echo <<<html
							<tr>
								<th scope="row"style="font-weight: bold;text-align: center;vertical-align: middle;">Номер п/п</th>
								<td style="font-weight: bold;text-align: center;vertical-align: middle;">ФИО</td>
								<td style="font-weight: bold;text-align: center;vertical-align: middle;">Категория</td>
								<td style="font-weight: bold;text-align: center;vertical-align: middle;">Дата атестации</td>
								<td style="font-weight: bold;text-align: center;vertical-align: middle;">Преподаваемые дисциплины</td>
							</tr>
html;
							for($i = 0; $i < $PCKteachersCount; $i++){
								$number = $i + 1;
								echo <<<html
									<tr>
										<th scope="row">{$number}</th>
										<td style="font-weight: bold;">{$fioArray[$i]}</td>
										<td>{$categoryArray[$i]}</td>
										<td>{$attestationArray[$i]}</td>
										<td>{$disciplinesArray[$i]}
										</td>
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
					<h3 class="textAlighInCenter">Добавление плана работы ПЦК ЕНД </h3>
					<form  method=post enctype=multipart/form-data>
					<h4>Выберите документ </h4>
					<input style="    margin: 2%;" type=file name=uploadfile>
					<button type=submit name="addDocPCKBTN" class="btn btn-default">Добавить</button></form>
					</div>
html;
					}

					if(isset($_POST['addDocPCKBTN'])){
						$uploaddir = './temp/';
						//Получение пути до файла и его копирование
						$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
						if($uploaddir != $uploadfile){
						copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
						}
						// Путь и имя файла на нашем сервере.
						$file = './temp/' . $_FILES['uploadfile']['name'];

						$filename = $_FILES['uploadfile']['name'];
						// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
						$response = YandexAddFiles($pathDocPCK,$file,$filename);
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

					if(!empty($_GET['delDocPCK_name'])){
						$del_name=$_GET['delDocPCK_name'];
						// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

						$response = YandexDelFiles($pathDocPCK,$del_name);
						if($response == "Успешно удалено"){
							echo <<<html
							<script>
							swal("Успех!", "{$response}", "success")
							.then((value) => {
							  location.replace('/PCK.php');
							});
							</script>
html;
						}else{
							echo <<<html
							<script>
							swal("Неудача!", "{$response}", "error")
							.then((value) => {
								location.replace('/PCK.php');
							});
							</script>
html;
						}
					}
					 ?>
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<?php
								if($_SESSION['login'] == 'admin'){
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Планы работы ПЦК ЕНД</th>
html;
								}else{
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Планы работы ПЦК ЕНД</th>
html;
								}
								 ?>
							</tr>
						</thead>
						<tbody>
							<?php
							$res = YandexGetFiles($pathDocPCK);
							for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
								$url = $res[_embedded][items][$i][public_url];
								if($url == null){
									$url = "#";
								}
								$position = $i + 1;
								$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);
								if($_SESSION['login'] == 'admin'){
							echo <<<html
								<tr style="cursor:pointer; width:100%;">
									<th class="tenPercentInTable" onclick="location.href = '{$url}';" scope="row">{$position}</th>
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td style="text-align:center;" class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?delDocPCK_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
								}else{
									echo <<<html
									<tr style="cursor:pointer; width:100%;">
										<th class="tenPercentInTable" onclick="location.href = '{$url}';" scope="row">{$position}</th>
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
					<h3 class="textAlighInCenter">Добавление отчета по мероприятиям предметной недели </h3>
					<form  method=post enctype=multipart/form-data>
					<h4>Выберите документ </h4>
					<input style="    margin: 2%;" type=file name=uploadfile>
					<button type=submit name="addOtchetEventsBTN" class="btn btn-default">Добавить</button></form>
					</div>
html;
					}

					if(isset($_POST['addOtchetEventsBTN'])){
						$uploaddir = './temp/';
						//Получение пути до файла и его копирование
						$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
						if($uploaddir != $uploadfile){
						copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
						}
						// Путь и имя файла на нашем сервере.
						$file = './temp/' . $_FILES['uploadfile']['name'];

						$filename = $_FILES['uploadfile']['name'];
						// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
						$response = YandexAddFiles($pathOtchetEvents,$file,$filename);
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

					if(!empty($_GET['delOtchetEvents_name'])){
						$del_name=$_GET['delOtchetEvents_name'];
						// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

						$response = YandexDelFiles($pathOtchetEvents,$del_name);
						if($response == "Успешно удалено"){
							echo <<<html
							<script>
							swal("Успех!", "{$response}", "success")
							.then((value) => {
								location.replace('/PCK.php');
							});
							</script>
html;
						}else{
							echo <<<html
							<script>
							swal("Неудача!", "{$response}", "error")
							.then((value) => {
								location.replace('/PCK.php');
							});
							</script>
html;
						}
					}
					 ?>
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<?php
								if($_SESSION['login'] == 'admin'){
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Отчеты по мероприятиям предметной недели</th>
html;
								}else{
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Отчеты по мероприятиям предметной недели</th>
html;
								}
								 ?>
							</tr>
						</thead>
						<tbody>
							<?php
							$res = YandexGetFiles($pathOtchetEvents);
							for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
								$url = $res[_embedded][items][$i][public_url];
								if($url == null){
									$url = "#";
								}
								$position = $i + 1;
								$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);
								if($_SESSION['login'] == 'admin'){
							echo <<<html
								<tr style="cursor:pointer; width:100%;">
									<th class="tenPercentInTable" onclick="location.href = '{$url}';" scope="row">{$position}</th>
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?delOtchetEvents_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
								}else{
									echo <<<html
									<tr style="cursor:pointer; width:100%;">
										<th class="tenPercentInTable" onclick="location.href = '{$url}';" scope="row">{$position}</th>
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
					<h3 class="textAlighInCenter">Добавление документа методической работы членов комиссии</h3>
					<form  method=post enctype=multipart/form-data>
					<h4>Выберите документ </h4>
					<input style="    margin: 2%;" type=file name=uploadfile>
					<button type=submit name="addMetodWorkBTN" class="btn btn-default">Добавить</button></form>
					</div>
html;
					}

					if(isset($_POST['addMetodWorkBTN'])){
						$uploaddir = './temp/';
						//Получение пути до файла и его копирование
						$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
						if($uploaddir != $uploadfile){
						copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
						}
						// Путь и имя файла на нашем сервере.
						$file = './temp/' . $_FILES['uploadfile']['name'];

						$filename = $_FILES['uploadfile']['name'];
						// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
						$response = YandexAddFiles($pathMetodWork,$file,$filename);
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

					if(!empty($_GET['delMetodWork_name'])){
						$del_name=$_GET['delMetodWork_name'];
						// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

						$response = YandexDelFiles($pathMetodWork,$del_name);
						if($response == "Успешно удалено"){
							echo <<<html
							<script>
							swal("Успех!", "{$response}", "success")
							.then((value) => {
								location.replace('/PCK.php');
							});
							</script>
html;
						}else{
							echo <<<html
							<script>
							swal("Неудача!", "{$response}", "error")
							.then((value) => {
								location.replace('/PCK.php');
							});
							</script>
html;
						}
					}
					 ?>
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<?php
								if($_SESSION['login'] == 'admin'){
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Методическая работа членов комиссии</th>
html;
								}else{
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Методическая работа членов комиссии</th>
html;
								}
								 ?>
							</tr>
						</thead>
						<tbody>
							<?php
							$res = YandexGetFiles($pathMetodWork);


							for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
								$url = $res[_embedded][items][$i][public_url];
								if($url == null){
									$url = "#";
								}
								$position = $i;
								$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);
								if($res[_embedded][items][$i][type] != 'dir'){
									if($_SESSION['login'] == 'admin'){
								echo <<<html
									<tr style="cursor:pointer; width:100%;">
										<th class="tenPercentInTable" onclick="location.href = '{$url}';" scope="row">{$position}</th>
										<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
										<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?delMetodWork_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
									</tr>
html;
									}else{
										echo <<<html
										<tr style="cursor:pointer; width:100%;">
											<th class="tenPercentInTable" onclick="location.href = '{$url}';" scope="row">{$position}</th>
											<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
										</tr>
html;
									}
								}

					}
							 ?>
						</tbody>
					</table>
					<?php
					if($_SESSION['login'] == 'admin'){
					echo <<<html
					<div style="width: 100%;" class="addOrEditDiv">
					<h3 class="textAlighInCenter">Добавление документа проектной деятельности студентов</h3>
					<form  method=post enctype=multipart/form-data>
					<h4>Выберите документ </h4>
					<input style="    margin: 2%;" type=file name=uploadfile>
					<button type=submit name="addStudentProjectsBTN" class="btn btn-default">Добавить</button></form>
					</div>
html;
					}

					if(isset($_POST['addStudentProjectsBTN'])){
						$uploaddir = './temp/';
						//Получение пути до файла и его копирование
						$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
						if($uploaddir != $uploadfile){
						copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
						}
						// Путь и имя файла на нашем сервере.
						$file = './temp/' . $_FILES['uploadfile']['name'];

						$filename = $_FILES['uploadfile']['name'];
						// Отправка данных в функцию добавления документа на яндекс диск, получение ответа и вывод сообщений
						$response = YandexAddFiles($pathStudentProjects,$file,$filename);
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

					if(!empty($_GET['delStudentProjects_name'])){
						$del_name=$_GET['delStudentProjects_name'];
						// Отправка данных в функцию удаления документа из яндекс диск, получение ответа и вывод сообщений

						$response = YandexDelFiles($pathStudentProjects,$del_name);
						if($response == "Успешно удалено"){
							echo <<<html
							<script>
							swal("Успех!", "{$response}", "success")
							.then((value) => {
								location.replace('/PCK.php');
							});
							</script>
html;
						}else{
							echo <<<html
							<script>
							swal("Неудача!", "{$response}", "error")
							.then((value) => {
								location.replace('/PCK.php');
							});
							</script>
html;
						}
					}
					 ?>
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<?php
								if($_SESSION['login'] == 'admin'){
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Проектная деятельность студентов</th>
html;
								}else{
								echo <<<html
								<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Проектная деятельность студентов</th>
html;
								}
								 ?>
							</tr>
						</thead>
						<tbody>
							<?php
							$res = YandexGetFiles($pathStudentProjects);
							for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
								$url = $res[_embedded][items][$i][public_url];
								if($url == null){
									$url = "#";
								}
								$position = $i + 1;
								$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);
								if($_SESSION['login'] == 'admin'){
							echo <<<html
								<tr style="cursor:pointer; width:100%;">
									<th class="tenPercentInTable" onclick="location.href = '{$url}';" scope="row">{$position}</th>
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?delStudentProjects_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
								}else{
									echo <<<html
									<tr style="cursor:pointer; width:100%;">
										<th class="tenPercentInTable" onclick="location.href = '{$url}';" scope="row">{$position}</th>
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
