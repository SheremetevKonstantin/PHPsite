<?php
session_start();

//AT
$path = '/Классное руководство/Методические разработки классных часов/';
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
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление документа </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите документ </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addDocBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addDocBTN'])){
					$uploaddir = './temp/';//дириктория временного хранения

					$uploadfile = $uploaddir.basename($_FILES['uploadfile']['name']);
					if($uploaddir != $uploadfile){
					copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
					}
					// Путь и имя файла на нашем сервере.
					$file = './temp/' . $_FILES['uploadfile']['name'];

					$filename = $_FILES['uploadfile']['name'];

					$response = YandexAddFiles($path,$file,$filename);//ответ от функции яндекс
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

				if(!empty($_GET['del_name'])){
					$del_name=$_GET['del_name'];
					$response = YandexDelFiles($path,$del_name);//ответ от функции яндекс
					if($response == "Успешно удалено"){
						echo <<<html
						<script>
						swal("Успех!", "{$response}", "success")
						.then((value) => {
							location.replace('/classroomGuide_metod.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "{$response}", "error")
						.then((value) => {
							location.replace('/classroomGuide_metod.php');
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
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="3">Методические разработки классных часов</th>
html;
							}else {
							echo <<<html
							<th scope="col" class="h2 tableHeader" style="text-align:center;" colspan="2">Методические разработки классных часов</th>
html;
							}
							 ?>
				    </tr>
				  </thead>
				  <tbody style="border:double">
						<?php
						$res = YandexGetFiles($path);
						for($i = 0; $i < sizeof($res[_embedded][items]); $i++){
							$url = $res[_embedded][items][$i][public_url];// формирование ссылки на файл
							if($url == null){
								$url = "#";
							}
							$position = $i + 1;
							$yandexFileName = YandexGetNameWithoutFormat($res[_embedded][items][$i][name]);//форматирование имени файла
							if($_SESSION['login'] == 'admin'){
						echo <<<html
								<tr style="cursor:pointer;width:100%;">
									<th class="tenPercentInTable" onclick="location.href = '{$url}';" scope="row">{$position}</th>
									<td onclick="location.href = '{$url}';"><p class="text_in_tableRow">{$yandexFileName}</p></td>
									<td class="text_in_tableRow widthTenPercent"><a onclick="isDelete('?del_name={$res[_embedded][items][$i][name]}')">Удалить</a></td>
								</tr>

html;
							}else{
								echo <<<html
								<tr style="cursor:pointer;">
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
