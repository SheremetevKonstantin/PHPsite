<?php
session_start();

//AT
$path_to_KOS = '/Студентам/Математика/ОУД04/КОС/';
$path_to_RP = '/Студентам/Математика/ОУД04/РП/';
$path_to_CurrentControl = '/Студентам/Математика/ОУД04/Текущий контроль/';


?>
<!doctype.html>
<html>
<head>
<?php
require_once("./assets/conn.php");
include 'YandexDrive.php';
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
<script src="https://lidrekon.ru/slep/js/jquery.js"></script>
<script src="https://lidrekon.ru/slep/js/uhpv-full.min.js"></script>
</head>
<body class="bodyFon">
<div class="container">
	<?php require_once("./assets/header.php") ?>
	<div class="content">
		<div class="main">
			<?php
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
						location.replace('/disciplines_matemat_1course.php');
					});
					</script>
html;
				}else{
					echo <<<html
					<script>
					swal("Неудача!", "{$response}", "error")
					.then((value) => {
						location.replace('/disciplines_matemat_1course.php');
					});
					</script>
html;
				}
			}
			 ?>
			<div class="row">
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
							$position = $i + 1;
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
							location.replace('/disciplines_matemat_1course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_1course.php');
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
							$position = $i + 1;
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
							location.replace('/disciplines_matemat_1course.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/disciplines_matemat_1course.php');
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
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;">
									<th onclick="location.href = '{$url}';" scope="row">{$position}</th>
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_CurCtrl_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>
html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
									<th onclick="location.href = '{$url}';" scope="row">{$position}</th>
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
