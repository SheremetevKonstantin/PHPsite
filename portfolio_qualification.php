<?php
session_start();
?>
<!doctype.html>
<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require_once("./assets/conn.php");


$query = "SELECT COUNT(id) FROM portfolio_qualification;";
$result = mysqli_query($conn, $query);
$PortQualCount = mysqli_fetch_assoc($result);
$PortQualCount = $PortQualCount["COUNT(id)"];

$query2 = "SELECT img from portfolio_qualification;";
$result2 = mysqli_query($conn,$query2);
$array1 = array();
while ($row = $result2->fetch_array())
	$array1[] = $row[0];

$query3 = "SELECT description from portfolio_qualification;";
$result3 = mysqli_query($conn,$query3);
$array2 = array();
while ($row = $result3->fetch_array())
	$array2[] = $row[0];

$query2 = "SELECT id from portfolio_qualification;";
$result2 = mysqli_query($conn,$query2);
$QualIdList = array();
while ($row = $result2->fetch_array())
	$QualIdList[] = $row[0];

		function uploadImage($image,$uploadir)
		{
				$extension = pathinfo($image['name'],PATHINFO_EXTENSION);
				$filename= uniqid() . "." . $extension;
				move_uploaded_file($image['tmp_name'],$uploadir . $filename);

				return $filename;
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
				<?php
					echo <<<html
					<div class='list_section col-xs-6 col-sm-12 col-md-12 headerText'>
							<h2 class="textAlighInCenter display-4">Повышение квалификации</h2>
					</div>
html;

			if($_SESSION['login'] == 'admin'){
			echo <<<html
			<div id="add" class="addOrEditDiv">
			<h3 class="textAlighInCenter">Добавление записи </h3>
			<form  method=post enctype=multipart/form-data>
			<textarea class="editTextarea" name="textareaAdd" maxlength="512"></textarea>
			<h4>Выберите картинку </h4>
			<input style="    margin: 2%;" type=file name=uploadfile>
			<button type=submit name="addBTN" class="btn btn-default">Добавить</button></form>
			</div>
html;
}


			if(isset($_POST['addBTN'])){
				$description = $_POST['textareaAdd'];
				$uploaddir = './img/portfolio/qualification/';
				if($_FILES['uploadfile']['name'] == ''){
					echo <<<html
					<script>
					swal("Предупреждение!", "Фотография не была выбрана!", "warning");
					</script>
html;
				}else{
					$uploadfile = $uploaddir.basename(uploadImage($_FILES['uploadfile'],$uploaddir));//формирование пути файла
					$sql = "Insert into portfolio_qualification (img,description) values ('$uploadfile','$description');";
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно добавлена", "success")
						.then((value) => {
							location.replace('/portfolio_qualification.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при добавлении", "error")
						.then((value) => {
							location.replace('/portfolio_qualification.php');
						});
						</script>
html;
					}
				}
			}

			if(!empty($_GET['red_id'])){
	$id_red = $_GET['red_id'];
	$query = "SELECT description FROM portfolio_qualification Where id={$id_red}";
	$result = mysqli_query($conn, $query);
	if($result){
		while($row = mysqli_fetch_array($result)){
		echo <<<html
		<div id="red" style="display:block" class="addOrEditDiv">
		<h3 class="textAlighInCenter">Редактирование записи </h3>
		<form  method=post enctype=multipart/form-data>
		<textarea class="editTextarea" name="textarea" maxlength="512">{$row["description"]}</textarea>
		<h4>Редактирование картинки</h4>
		<input style="    margin: 2%;" type=file name=uploadfile>
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
			$description = $_POST['textarea'];
			$uploaddir = './img/portfolio/qualification/';
			if($_FILES['uploadfile']['name'] != ''){
				$uploadfile = $uploaddir.basename(uploadImage($_FILES['uploadfile'],$uploaddir));//формирование пути файла
				$sql = "Update portfolio_qualification Set img = '{$uploadfile}',description = '$description'  Where id = {$id_red}";
				$result = mysqli_query($conn, $sql);
				if($result){
					echo <<<html
					<script>
					swal("Успех!", "Запись была успешно редактирована", "success")
					.then((value) => {
						location.replace('/portfolio_qualification.php');
					});
					</script>
html;
				}else{
					echo <<<html
					<script>
					swal("Неудача!", "Ошибка при редактировании", "error")
					.then((value) => {
						location.replace('/portfolio_qualification.php');
					});
					</script>
html;
				}
			}else{
				$sql = "Update portfolio_qualification Set description = '$description'  Where id = {$id_red}";
				$result = mysqli_query($conn, $sql);
				if($result){
					echo <<<html
					<script>
					swal("Успех!", "Запись была успешно редактирована", "success")
					.then((value) => {
						location.replace('/portfolio_qualification.php');
					});
					</script>
html;
				}else{
					echo <<<html
					<script>
					swal("Неудача!", "Ошибка при редактировании", "error")
					.then((value) => {
						location.replace('/portfolio_qualification.php');
					});
					</script>
html;
				}
			}
	}
}
}


				if($_SESSION['login'] == 'admin'){
					for ($i=0;$i<$PortQualCount;$i++){
						echo <<<html
						<table class="table">
html;

								for ($i=0;$i<$PortQualCount;$i++){
			echo 			<<<HTML
							  <tbody>
								<tr style="width: 100%;">
								  <td class="tdQualification" style="width: 30%;"><a href="{$array1[$i]}"><img src="{$array1[$i]}" class=imgInTable></a></td>
								  <td class="tdQualification" style="width: 70%;"><p>{$array2[$i]}</p></td>
									<td style="text-align:center;"><a href="?red_id={$QualIdList[$i]}">Редактировать</a></td>
									<td style="text-align:center;"><a onclick="isDelete('?del_id={$QualIdList[$i]}')" style="cursor:pointer;">Удалить</a></td>
								</tr>
							  </tbody>
HTML;
										}

						echo <<<html
								</table>
html;
						}
					}else{
						echo <<<html
						<table class="table">
html;

								for ($i=0;$i<$PortQualCount;$i++){
			echo 			<<<HTML
							  <tbody>
								<tr style="width: 100%;">
								  <td class="tdQualification" style="width: 30%;"><a href="{$array1[$i]}"><img src="{$array1[$i]}" class=imgInTable></a></td>
								  <td class="tdQualification" style="width: 70%;"><p>{$array2[$i]}</p></td>
								</tr>
							  </tbody>
HTML;
										}

						echo <<<html
								</table>
html;

				}
				if(!empty($_GET['del_id'])){
					$id_del = $_GET['del_id'];
					$sql = "Delete from portfolio_qualification  Where id = {$id_del}";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Успешно удалено", "success")
						.then((value) => {
							location.replace('/portfolio_qualification.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/portfolio_qualification.php');
						});
						</script>
html;
					}
				}
				?>
			</div>

		</div>
      </div>
  </div>
</body>
</html>
