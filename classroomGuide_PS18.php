<?php
session_start();
?>
<!doctype.html>
<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require_once("./assets/conn.php");
$tag = $_GET['tag'];

$query = "SELECT COUNT(id) FROM classroomGuide_ps18Videos where course = $tag;";
$result = mysqli_query($conn, $query);
$videosCount = mysqli_fetch_assoc($result);
$videosCount = $videosCount["COUNT(id)"];

$query2 = "SELECT path from classroomGuide_ps18Videos where course = $tag;";
$result2 = mysqli_query($conn,$query2);
$pathList = array();
while ($row = $result2->fetch_array())
	$pathList[] = $row[0];

$query2 = "SELECT id from classroomGuide_ps18Videos where course = $tag;";
$result2 = mysqli_query($conn,$query2);
$pathIdList = array();
while ($row = $result2->fetch_array())
	$pathIdList[] = $row[0];

$query3 = "SELECT COUNT(id) FROM classroomGuide_ps18Rewards where course = $tag;";
$result3 = mysqli_query($conn, $query3);
$rewardsCount = mysqli_fetch_assoc($result3);
$rewardsCount = $rewardsCount["COUNT(id)"];

$query4 = "SELECT img from classroomGuide_ps18Rewards where course = $tag;";
$result4 = mysqli_query($conn,$query4);
$imgList = array();
while ($row = $result4->fetch_array())
	$imgList[] = $row[0];

$query4 = "SELECT id from classroomGuide_ps18Rewards where course = $tag;";
$result4 = mysqli_query($conn,$query4);
$imgIdList = array();
while ($row = $result4->fetch_array())
	$imgIdList[] = $row[0];


$query5 = "SELECT eventName from classroomGuide_ps18Events where course = $tag;";
$result5 = mysqli_query($conn,$query5);
$EventNamesList = array();
while ($row = $result5->fetch_array())
	$EventNamesList[] = $row[0];

$query6 = "SELECT COUNT(id) FROM classroomGuide_ps18Events where course = $tag;";
$result6 = mysqli_query($conn, $query6);
$eventsCount = mysqli_fetch_assoc($result6);
$eventsCount = $eventsCount["COUNT(id)"];

$query7 = "SELECT img from classroomGuide_ps18Events where course = $tag;";
$result7 = mysqli_query($conn,$query7);
$imgEventList = array();
while ($row = $result7->fetch_array())
	$imgEventList[] = $row[0];

$query7 = "SELECT id from classroomGuide_ps18Events where course = $tag;";
$result7 = mysqli_query($conn,$query7);
$imgEventIdList = array();
while ($row = $result7->fetch_array())
	$imgEventIdList[] = $row[0];


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
							<h2 class="textAlighInCenter display-4">Награды и грамоты</h2>
					</div>
html;

					if($_SESSION['login'] == 'admin'){
					echo <<<html
					<div style="width: 100%;" class="addOrEditDiv">
					<h3 class="textAlighInCenter">Добавление фотографии </h3>
					<form  method=post enctype=multipart/form-data>
					<h4>Выберите картинку </h4>
					<input style="    margin: 2%;" type=file name=uploadfile>
					<button type=submit name="addImage" class="btn btn-default">Добавить</button></form>
					</div>
html;
					}

				if(isset($_POST['addImage'])){
					$uploaddir = './img/ClassroomGuide/PS18Rewards/';//назначение дириктории загрузки
					if($_FILES['uploadfile']['name'] == ''){
						echo <<<html
						<script>
						swal("Предупреждение!", "Фотография не была выбрана!", "warning");
						</script>
html;
					}else{
						$uploadfile = $uploaddir.basename(uploadImage($_FILES['uploadfile'],$uploaddir));//формирование пути файла
						$cource = $_GET['tag'];
						$sql = "Insert into classroomGuide_ps18Rewards (img,course) values ('$uploadfile','$cource');";//формирование запроса
						$result = mysqli_query($conn, $sql);
						if($result){
							echo <<<html
							<script>
							swal("Успех!", "Фотография была успешно добавлена", "success")
							.then((value) => {
								location.replace('/classroomGuide_PS18.php?tag={$_GET['tag']}');
							});
							</script>
html;
						}else{
							echo <<<html
							<script>
							swal("Неудача!", "Ошибка при добавлении", "error")
							.then((value) => {
								location.replace('/classroomGuide_PS18.php?tag={$_GET['tag']}');
							});
							</script>
html;
						}
					}
				}

				if($_SESSION['login'] == 'admin'){
					for ($i=0;$i<$rewardsCount;$i++){
echo 			<<<HTML
					<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
							<div >
								<a href="{$imgList[$i]}">
									<img alt="Грамота" src='{$imgList[$i]}' style='width:100%;' />
								</a>
							</div>
							 <a onclick="isDelete('?tag={$_GET['tag']}&Reward_del_id={$imgIdList[$i]}')" style="width:100%"  class="btn btn-outline-secondary">Удалить</a>
				 </div>
HTML;
					}
				}else{
					for ($i=0;$i<$rewardsCount;$i++){
echo 			<<<HTML
					<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
								<div >
									<a href="{$imgList[$i]}">
										<img alt="Грамота" src='{$imgList[$i]}' style='width:100%;' />
									</a>
								</div>
					</div>
HTML;
					}
				}
					echo <<<html
					<div class='list_section col-xs-6 col-sm-12 col-md-12 headerText'>
							<h2 class="textAlighInCenter display-4">Видеоролики</h2>
					</div>
html;

					if($_SESSION['login'] == 'admin'){
					echo <<<html
					<div style="width: 100%;" class="addOrEditDiv">
					<h3 class="textAlighInCenter">Добавление видеоролика </h3>
					<form  method=post>
					<h4>Вставте ссылку на видеоролик</h4>
					<input type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" name="videoLink" required maxlength="250"></input>
					<button type=submit name="addVid" class="btn btn-default">Добавить</button></form>
					</div>
html;
					}

				if(isset($_POST['addVid'])){
						$videoLink = $_POST['videoLink'];
						$cource = $_GET['tag'];
						$videoLink = str_replace("https://youtu.be/","https://www.youtube.com/embed/",$videoLink);//формирование валидной ссылки
						$sql = "Insert into classroomGuide_ps18Videos (path,course) values ('$videoLink','$cource');";//формирование запроса
						$result = mysqli_query($conn, $sql);
						if($result){
							echo <<<html
							<script>
							swal("Успех!", "Видеоролик был успешно добавлен", "success")
							.then((value) => {
								location.replace('/classroomGuide_PS18.php?tag={$_GET['tag']}');
							});
							</script>
html;
						}else{
							echo <<<html
							<script>
							swal("Неудача!", "Ошибка при добавлении", "error")
							.then((value) => {
								location.replace('/classroomGuide_PS18.php?tag={$_GET['tag']}');
							});
							</script>
html;
						}
				}

				if($_SESSION['login'] == 'admin'){
					for ($i=0;$i<$videosCount;$i++){
					echo 			<<<HTML
										<div class='list_section col-xs-6 col-sm-11 col-md-5 videoFrame'>
												<iframe width="100%"  height="315" src="{$pathList[$i]}"
												 frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
													allowfullscreen></iframe>
													<a onclick="isDelete('?tag={$_GET['tag']}&VideoDel_id={$pathIdList[$i]}')" style="width:100%"  class="btn btn-outline-secondary">Удалить</a>

										</div>
HTML;
										}
				}
				else{
					for ($i=0;$i<$videosCount;$i++){
						echo <<<HTML
						<div class='list_section col-xs-6 col-sm-11 col-md-5 videoFrame'>
								<iframe width="100%"  height="315" src="{$pathList[$i]}"
								 frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
									allowfullscreen></iframe>
						</div>
HTML;
					}
				}

					 echo <<<html
					 <div class='list_section col-xs-6 col-sm-12 col-md-12 headerText'>
							 <h2 class="textAlighInCenter display-4">Фотоотчеты о проведенных мероприятиях</h2>
					 </div>
html;

					if($_SESSION['login'] == 'admin'){
					 echo <<<html
					 <div style="width:100%;" class="addOrEditDiv">
					 <h3 class="textAlighInCenter">Добавление фотоотчета </h3>
					 <form  method=post enctype=multipart/form-data>
					 <h4>Введите название мероприятия  </h4>
					 <input required type="text" style="height:50px;font-size: 2em;    border: solid;width: 100%;" name="EventText" maxlength="50"></input>
 					<h4>Выберите картинку </h4>
					 <input style="    margin: 2%;" type=file name=uploadfile>
					 <button type=submit name="addBTN" class="btn btn-default">Добавить</button></form>
					 </div>
html;
					}


					 if(isset($_POST['addBTN'])){
						 $eventText = $_POST['EventText'];
						 $uploaddir = './img/ClassroomGuide/PS18Events/';//назначение дириктории загрузки
						 $course = $_GET['tag'];
						 if($_FILES['uploadfile']['name'] == ''){
							 echo <<<html
							 <script>
							 swal("Предупреждение!", "Фотография не была выбрана!", "warning");
							 </script>
html;
						 }else{


							 $uploadfile = $uploaddir.basename(uploadImage($_FILES['uploadfile'],$uploaddir));//формирование пути файла
							 $sql = "Insert into classroomGuide_ps18Events (img,eventName,course) values ('$uploadfile','$eventText','$course');";//формирование запроса
							 $result = mysqli_query($conn, $sql);
							 if($result){
								 echo <<<html
	 							<script>
	 							swal("Успех!", "Фотоотчет была успешно добавлена", "success")
	 							.then((value) => {
	 								location.replace('/classroomGuide_PS18.php?tag={$_GET['tag']}');
	 							});
	 							</script>
html;
						 }else{
							 echo <<<html
 							<script>
 							swal("Неудача!", "Ошибка при добавлении", "error")
 							.then((value) => {
 								location.replace('/classroomGuide_PS18.php?tag={$_GET['tag']}');
 							});
 							</script>
html;
							 }
						 }
					 }


				 if($_SESSION['login'] == 'admin'){

					 for ($i=0;$i<$eventsCount;$i++){
		echo 			<<<HTML
						 <div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
									 <div >
										 <a href="{$imgEventList[$i]}">
											 <img src='{$imgEventList[$i]}' style='width:100%;' />
									 	</a>
									 </div>
									 <div >
										 <p style='width:100%;'>{$EventNamesList[$i]}</p>
									 </div>
									 <a onclick="isDelete('?tag={$_GET['tag']}&Event_del_id={$imgEventIdList[$i]}')" style="width:100%"  class="btn btn-outline-secondary">Удалить</a>
						 </div>
HTML;
					 	}
				 }else{
					 for ($i=0;$i<$eventsCount;$i++){
		echo 			<<<HTML
						 <div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
									 <div >
										 <a href="{$imgEventList[$i]}">
										 	<img src='{$imgEventList[$i]}' style='width:100%;' />
										 </a>
									 </div>
									 <div >
										 <p style='width:100%;'>{$EventNamesList[$i]}</p>
									 </div>
						 </div>
HTML;
					 	}
				 }


				 if(!empty($_GET['VideoDel_id'])){
			 		$id_del = $_GET['VideoDel_id'];
			 		$sql = "Delete from classroomGuide_ps18Videos  Where id = {$id_del}";//формирование запроса
			 		$result = mysqli_query($conn, $sql);
			 		if($result){
						echo <<<html
						<script>
						swal("Успех!", "Успешно удалено", "success")
						.then((value) => {
							location.replace('/classroomGuide_PS18.php?tag={$_GET['tag']}');
						});
						</script>
html;
			 		}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/classroomGuide_PS18.php?tag={$_GET['tag']}');
						});
						</script>
html;
			 		}
			 	}

			 	if(!empty($_GET['Reward_del_id'])){
			 		$id_del = $_GET['Reward_del_id'];
			 		$sql = "Delete from classroomGuide_ps18Rewards  Where id = {$id_del}";//формирование запроса
			 		$result = mysqli_query($conn, $sql);
			 		if($result){
						echo <<<html
						<script>
						swal("Успех!", "Успешно удалено", "success")
						.then((value) => {
							location.replace('/classroomGuide_PS18.php?tag={$_GET['tag']}');
						});
						</script>
html;
			 		}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/classroomGuide_PS18.php?tag={$_GET['tag']}');
						});
						</script>
html;
			 		}
			 	}

			 	if(!empty($_GET['Event_del_id'])){
			 		$id_del = $_GET['Event_del_id'];
			 		$sql = "Delete from classroomGuide_ps18Events Where id = {$id_del}";//формирование запроса
			 		$result = mysqli_query($conn, $sql);
			 		if($result){
						echo <<<html
						<script>
						swal("Успех!", "Успешно удалено", "success")
						.then((value) => {
							location.replace('/classroomGuide_PS18.php?tag={$_GET['tag']}');
						});
						</script>
html;
			 		}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/classroomGuide_PS18.php?tag={$_GET['tag']}');
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
