<?php
session_start();
?>
<!doctype.html>
<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require_once("./assets/conn.php");

	$query = "SELECT COUNT(id) FROM portfolio_publication;";
	$result = mysqli_query($conn, $query);
	$PortPublicationCount = mysqli_fetch_assoc($result);
	$PortPublicationCount = $PortPublicationCount["COUNT(id)"];

	$query2 = "SELECT img from portfolio_publication;";
	$result2 = mysqli_query($conn,$query2);
	$array1 = array();
	while ($row = $result2->fetch_array())
    $array1[] = $row[0];

	$query2 = "SELECT id from portfolio_publication;";
	$result2 = mysqli_query($conn,$query2);
	$arrayID = array();
	while ($row = $result2->fetch_array())
		$arrayID[] = $row[0];

	$query = "SELECT COUNT(id) FROM portfolio_changeProfExperience;";
	$result = mysqli_query($conn, $query);
	$PortChExpCount = mysqli_fetch_assoc($result);
	$PortChExpCount = $PortChExpCount["COUNT(id)"];

	$query2 = "SELECT text from portfolio_changeProfExperience;";
	$result2 = mysqli_query($conn,$query2);
	$arrayChExpText = array();
	while ($row = $result2->fetch_array())
    $arrayChExpText[] = $row[0];

	$query2 = "SELECT id from portfolio_changeProfExperience;";
	$result2 = mysqli_query($conn,$query2);
	$arrayChExpID = array();
	while ($row = $result2->fetch_array())
		$arrayChExpID[] = $row[0];

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
						<h2 class="textAlighInCenter display-4">Обмен профессиональным опытом</h2>
				</div>
				<ol class="num-list">

html;
			if($_SESSION['login'] == 'admin'){
			echo <<<html
			<div id=add style="width: 100%;" class="addOrEditDiv">
			<h3 class="textAlighInCenter">Добавление</h3>
			<form  method="post">
			<h4>Введите текст</h4>
			<textarea style="width:100%;margin-bottom:15px;" name="text" required maxlength=250></textarea>
			<button type=submit name="addChangeExpBTN" class="btn btn-default">Добавить</button></form>
			</div>
html;
			}

			if(isset($_POST['addChangeExpBTN'])){
					$text = $_POST['text'];
					$sql = "Insert into portfolio_changeProfExperience (text) values ('$text');";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Запись была успешно добавлена", "success")
						.then((value) => {
							location.replace('/portfolio_publication.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при добавлении", "error")
						.then((value) => {
							location.replace('/portfolio_publication.php');
						});
						</script>
html;
					}
			}

			if(!empty($_GET['id_red'])){
				$id_red = $_GET['id_red'];
				$sql = "Select text From portfolio_changeProfExperience Where id = {$id_red}";//формирование запроса
				$result = mysqli_query($conn, $sql);
				if($result){
					while($row = mysqli_fetch_array($result)){
					echo <<<html
					<div id="red" style="display:block;width:100%;" class="addOrEditDiv">
					<h3 class="textAlighInCenter">Редактированиe</h3>
					<form  method="post">
					<h4>Введите текст</h4>
					<textarea style="width:100%;margin-bottom:15px;" name="text" required maxlength=250>{$row["text"]}</textarea>
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
							$text = $_POST['text'];
							$sql = "Update portfolio_changeProfExperience Set text='{$text}' Where id = {$id_red};";//формирование запроса
							$result = mysqli_query($conn, $sql);
							if($result){
								echo <<<html
								<script>
								swal("Успех!", "Запись была успешно редактирована", "success")
								.then((value) => {
									location.replace('/portfolio_publication.php');
								});
								</script>
html;
							}else{
								echo <<<html
								<script>
								swal("Неудача!", "Ошибка при редактировании", "error")
								.then((value) => {
									location.replace('/portfolio_publication.php');
								});
								</script>
html;
							}
						}
					}
				}


				if(!empty($_GET['id_del'])){
					$id_del = $_GET['id_del'];
					$sql = "Delete from portfolio_changeProfExperience  Where id = {$id_del}";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Успешно удалено", "success")
						.then((value) => {
							location.replace('/portfolio_publication.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/portfolio_publication.php');
						});
						</script>
html;
					}
				}




				if($_SESSION['login'] == 'admin'){
					for($i = 0; $i < $PortChExpCount; $i++){
						$position = $i + 1;
						echo <<<html
						<div>
							<li><span>{$position}</span>{$arrayChExpText[$i]}</li>
							<div style="display:flex;">
								<button onClick="document.location = '?id_red={$arrayChExpID[$i]}'" type=submit style="width:49%;" name="addBTN" class="btn btn-default">Редактировать</button></form>
								<button onclick="isDelete('?id_del={$arrayChExpID[$i]}')" type=submit style="width:49%;margin-left: 2%;" name="addBTN" class="btn btn-default">Удалить</button></form>

							</div>
						</div>
html;
					}
				}else{
					for($i = 0; $i < $PortChExpCount; $i++){
						$position = $i + 1;
						echo <<<html
						<div>
							<li><span>{$position}</span>{$arrayChExpText[$i]}</li>
						</div>
html;
					}
				}



					echo <<<html
					</ol>
					<div class='list_section col-xs-6 col-sm-12 col-md-12 headerText'>
							<h2 class="textAlighInCenter display-4">Публикации</h2>
					</div>
html;

					if($_SESSION['login'] == 'admin'){
					echo <<<html
					<div style="width: 100%;" class="addOrEditDiv">
					<h3 class="textAlighInCenter">Добавление фотографии </h3>
					<form  method="post" enctype=multipart/form-data>
					<h4>Выберите картинку </h4>
					<input style="    margin: 2%;" type=file name=uploadfile>
					<button type=submit name="addBTN" class="btn btn-default">Добавить</button></form>
					</div>
html;
					}

				if(isset($_POST['addBTN'])){
					$uploaddir = './img/portfolio/portfolio_publication/';//назначение дириктории загрузки
					if($_FILES['uploadfile']['name'] == ''){
						echo <<<html
						<script>
						swal("Предупреждение!", "Фотография не была выбрана!", "warning");
						</script>
html;
					}else{
						$uploadfile = $uploaddir.basename(uploadImage($_FILES['uploadfile'],$uploaddir));//формирование пути файла
						$sql = "Insert into portfolio_publication (img) values ('$uploadfile');";//формирование запроса
						$result = mysqli_query($conn, $sql);
						if($result){
							echo <<<html
							<script>
							swal("Успех!", "Фотография была успешно добавлена", "success")
							.then((value) => {
								location.replace('/portfolio_publication.php');
							});
							</script>
html;
						}else{
							echo <<<html
							<script>
							swal("Неудача!", "Ошибка при добавлении", "error")
							.then((value) => {
								location.replace('/portfolio_publication.php');
							});
							</script>
html;
						}
					}
				}


				if($_SESSION['login'] == 'admin'){
					for ($i=0;$i<$PortPublicationCount;$i++){
	echo 			<<<HTML
					  <div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
							<form method="post">
								<div >
									<a href="{$array1[$i]}">
										<img alt="Изображение публикации" src='{$array1[$i]}' style='width:100%;' />
									</a>
								</div>

									<a onclick="isDelete('?del_id={$arrayID[$i]}')" style="width:100%"  class="btn btn-outline-secondary">Удалить</a>

							</form>
						</div>
HTML;
						}
					}else{
					for ($i=0;$i<$PortPublicationCount;$i++){
	echo 			<<<HTML
					  <div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
									<div >
										<a href="{$array1[$i]}">
											<img alt="Изображение публикации" src='{$array1[$i]}' style='width:100%;' />
										</a>
									</div>
						</div>
HTML;
					}
				}


				if(!empty($_GET['del_id'])){
					$id_del = $_GET['del_id'];
					$sql = "Delete from portfolio_publication  Where id = {$id_del}";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Успешно удалено", "success")
						.then((value) => {
							location.replace('/portfolio_publication.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/portfolio_publication.php');
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
