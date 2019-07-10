<?php
session_start();
?>
<!doctype.html>
<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require_once("./assets/conn.php");
// onclick="isDelete('')"
	$query = "SELECT COUNT(id) FROM classroomGuide_groupsPhotos;";
	$result = mysqli_query($conn, $query);
	$groupsPhotosCount = mysqli_fetch_assoc($result);
	$groupsPhotosCount = $groupsPhotosCount["COUNT(id)"];

	$query2 = "SELECT img from classroomGuide_groupsPhotos;";
	$result2 = mysqli_query($conn,$query2);
	$groupsPhotosImgs = array();
	while ($row = $result2->fetch_array())
    $groupsPhotosImgs[] = $row[0];

	$query2 = "SELECT id from classroomGuide_groupsPhotos;";
	$result2 = mysqli_query($conn,$query2);
	$arrayId = array();
	while ($row = $result2->fetch_array())
		$arrayId[] = $row[0];

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
					<div class='list_section col-xs-6 col-sm-12 col-md-12'  style="background: #0d146e;color:#fff;">
							<h2 class="textAlighInCenter display-4">Фотографии выпускных групп</h2>
					</div>
					<div class='list_section col-xs-6 col-sm-12 col-md-12' style="background: #0d146e;color:#fff;">
							<h2 class="textAlighInCenter display-4">1985 - 2018 гг.</h2>
					</div>
html;

					if($_SESSION['login'] == 'admin'){
					echo <<<html
					<div style="width: 100%;"  class="addOrEditDiv">
					<h3 class="textAlighInCenter">Добавление фотографии </h3>
					<form  method=post enctype=multipart/form-data>
					<h4>Выберите картинку </h4>
					<input style="    margin: 2%;" type=file name=uploadfile>
					<button type=submit name="addBTN" class="btn btn-default">Добавить</button></form>
					</div>
html;
					}

				if(isset($_POST['addBTN'])){
					$uploaddir = './img/ClassroomGuide/groupsPhotos/';//назначение дириктории загрузки
					if($_FILES['uploadfile']['name'] == ''){
						echo <<<html
						<script>
						swal("Предупреждение!", "Фотография не была выбрана!", "warning");
						</script>
html;
					}else{
						$uploadfile = $uploaddir.basename(uploadImage($_FILES['uploadfile'],$uploaddir));//формирование пути файла
						$sql = "Insert into classroomGuide_groupsPhotos (img) values ('$uploadfile');";//формирование запроса
						$result = mysqli_query($conn, $sql);
						if($result){
							echo <<<html
							<script>
							swal("Успех!", "Фотография была успешно добавлена", "success")
							.then((value) => {
								location.replace('/classroomGuide_groupsPhotos.php');
							});
							</script>
html;
						}else{
							echo <<<html
							<script>
							swal("Неудача!", "Ошибка при добавлении", "error")
							.then((value) => {
								location.replace('/classroomGuide_groupsPhotos.php');
							});
							</script>
html;
						}
					}
				}

				if($_SESSION['login'] == 'admin'){
					for ($i=0;$i<$groupsPhotosCount;$i++){
	echo 			<<<HTML
						<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
							<form method="post">
								<div >
									<a href="{$groupsPhotosImgs[$i]}">
										<img alt="Фотография выпускной группы" src='{$groupsPhotosImgs[$i]}' style='width:100%;' />
									</a>
								</div>

									<a onclick="isDelete('?del_id={$arrayId[$i]}')" style="width:100%"  class="btn btn-outline-secondary">Удалить</a>

							</form>
						</div>
HTML;
					}
				}else{
					for ($i=0;$i<$groupsPhotosCount;$i++){
	echo 			<<<HTML
					  <div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
									<div >
										<a href="{$groupsPhotosImgs[$i]}">
											<img alt="Фотография выпускной группы" src='{$groupsPhotosImgs[$i]}' style='width:100%;' />
										</a>
									</div>
						</div>
HTML;
					}
				}

				if(!empty($_GET['del_id'])){
					$id_del = $_GET['del_id'];
					$sql = "Delete from classroomGuide_groupsPhotos  Where id = {$id_del}";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Успешно удалено", "success")
						.then((value) => {
							location.replace('/classroomGuide_groupsPhotos.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/classroomGuide_groupsPhotos.php');
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
