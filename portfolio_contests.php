<?php
session_start();
?>
<!doctype.html>
<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require_once("./assets/conn.php");

	$query = "SELECT COUNT(id) FROM portfolio_contests Where participation_place = '0';";
	$result = mysqli_query($conn, $query);
	$PortContestCount0 = mysqli_fetch_assoc($result);
	$PortContestCount0 = $PortContestCount0["COUNT(id)"];

	$query = "SELECT COUNT(id) FROM portfolio_contests Where participation_place = '1';";
	$result = mysqli_query($conn, $query);
	$PortContestCount1 = mysqli_fetch_assoc($result);
	$PortContestCount1 = $PortContestCount1["COUNT(id)"];

	$query = "SELECT COUNT(id) FROM portfolio_contests Where participation_place = '2';";
	$result = mysqli_query($conn, $query);
	$PortContestCount2 = mysqli_fetch_assoc($result);
	$PortContestCount2 = $PortContestCount2["COUNT(id)"];

	$query = "SELECT COUNT(id) FROM portfolio_contests Where participation_place = '3';";
	$result = mysqli_query($conn, $query);
	$PortContestCount3 = mysqli_fetch_assoc($result);
	$PortContestCount3 = $PortContestCount3["COUNT(id)"];

	$query = "SELECT COUNT(id) FROM portfolio_contests Where participation_place = '4';";
	$result = mysqli_query($conn, $query);
	$PortContestCount4 = mysqli_fetch_assoc($result);
	$PortContestCount4 = $PortContestCount4["COUNT(id)"];

	$query2 = "SELECT img from portfolio_contests Where participation_place = '0';";
	$result2 = mysqli_query($conn,$query2);
	$PortContestImg0 = array();
	while ($row = $result2->fetch_array())
    $PortContestImg0[] = $row[0];

	$query2 = "SELECT img from portfolio_contests Where participation_place = '1';";
	$result2 = mysqli_query($conn,$query2);
	$PortContestImg1 = array();
	while ($row = $result2->fetch_array())
    $PortContestImg1[] = $row[0];

	$query2 = "SELECT img from portfolio_contests Where participation_place = '2';";
	$result2 = mysqli_query($conn,$query2);
	$PortContestImg2 = array();
	while ($row = $result2->fetch_array())
    $PortContestImg2[] = $row[0];

	$query2 = "SELECT img from portfolio_contests Where participation_place = '3';";
	$result2 = mysqli_query($conn,$query2);
	$PortContestImg3 = array();
	while ($row = $result2->fetch_array())
    $PortContestImg3[] = $row[0];

	$query2 = "SELECT img from portfolio_contests Where participation_place = '4';";
	$result2 = mysqli_query($conn,$query2);
	$PortContestImg4 = array();
	while ($row = $result2->fetch_array())
    $PortContestImg4[] = $row[0];

	$query = "SELECT id FROM portfolio_contests Where participation_place = '0';";
	$result = mysqli_query($conn, $query);
	$ArrayIDWithPlaceNull = array();
	while ($row = $result->fetch_array())
	$ArrayIDWithPlaceNull[] = $row[0];

	$query = "SELECT id FROM portfolio_contests Where participation_place = '1';";
	$result = mysqli_query($conn, $query);
	$ArrayIDWithPlaceOne = array();
	while ($row = $result->fetch_array())
	$ArrayIDWithPlaceOne[] = $row[0];

	$query = "SELECT id FROM portfolio_contests Where participation_place = '2';";
	$result = mysqli_query($conn, $query);
	$ArrayIDWithPlaceTwo = array();
	while ($row = $result->fetch_array())
	$ArrayIDWithPlaceTwo[] = $row[0];

	$query = "SELECT id FROM portfolio_contests Where participation_place = '3';";
	$result = mysqli_query($conn, $query);
	$ArrayIDWithPlaceThree = array();
	while ($row = $result->fetch_array())
	$ArrayIDWithPlaceThree[] = $row[0];

	$query = "SELECT id FROM portfolio_contests Where participation_place = '4';";
	$result = mysqli_query($conn, $query);
	$ArrayIDWithPlaceFour = array();
	while ($row = $result->fetch_array())
	$ArrayIDWithPlaceFour[] = $row[0];

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
						<h2 class="textAlighInCenter display-4">Участие в конкурсах</h2>
				</div>
html;
					if($_SESSION['login'] == 'admin'){
						echo <<<html
						<div id="add" class="addOrEditDiv">
						<h3 class="textAlighInCenter">Добавление фотографии </h3>
						<form  method=post enctype=multipart/form-data>
						<h4>Выберите картинку </h4>
						<input style="    margin: 2%;" type=file name=uploadfile>
						<h4>Регион участия</h4>
						<select name="participation_place" style="    margin-bottom: 2%;  margin-top: 2%; width:100%;">
						<option>участие в международных олимпиадах</option>
						<option>участие во всероссийских конкурсах и олимпиадах</option>
						<option>участие в областных и районных конкурсах и олимпиадах</option>
						<!--<option>участие в районных конкурсах</option>--!>
						<option>участие в конкурсах и олимпиадах техникума</option>
						</select>
						<button type=submit name="addBTN" class="btn btn-default">Добавить</button></form>
						</div>
html;
						}

					if(isset($_POST['addBTN'])){
						$uploaddir = './img/portfolio/contests/';//назначение дириктории загрузки
						if($_FILES['uploadfile']['name'] == ''){
							echo <<<html
							<script>
							swal("Предупреждение!", "Фотография не была выбрана!", "warning");
							</script>
html;
						}else{
							$uploadfile = $uploaddir.basename(uploadImage($_FILES['uploadfile'],$uploaddir));//формирование пути файла
							$patPlaceRow = $_POST['participation_place'];
							switch ($patPlaceRow) {
								case 'участие в международных олимпиадах':
									$placeParticipate='0';
									break;
								case 'участие во всероссийских конкурсах и олимпиадах':
									$placeParticipate='1';
									break;
								case 'участие в областных конкурсах и олимпиадах':
									$placeParticipate='2';
									break;
								case 'участие в районных конкурсах':
									$placeParticipate='3';
									break;
								case 'участие в конкурсах и олимпиадах техникума':
									$placeParticipate='4';
									break;
							}
							$sql = "Insert into portfolio_contests (img,participation_place) values ('$uploadfile','$placeParticipate');";//формирование запроса
							$result = mysqli_query($conn, $sql);
							if($result){
								echo <<<html
								<script>
								swal("Успех!", "Запись была успешно добавлена", "success")
								.then((value) => {
									location.replace('/portfolio_contests.php');
								});
								</script>
html;
							}else{
								echo <<<html
								<script>
								swal("Неудача!", "Ошибка при добавлении", "error")
								.then((value) => {
									location.replace('/portfolio_contests.php');
								});
								</script>
html;
							}
						}
					}
				if(!empty($_GET['del_id'])){
					$id_del = $_GET['del_id'];
					$sql = "Delete from portfolio_contests  Where id = {$id_del}";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Успешно удалено", "success")
						.then((value) => {
							location.replace('/portfolio_contests.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при удалении", "error")
						.then((value) => {
							location.replace('/portfolio_contests.php');
						});
						</script>
html;
					}
				}

		echo <<<html
		<div class='paddingNull list_section col-xs-6 col-sm-12 col-md-12'>
			<h5 class="contestHeaderText marginTopFivePercent">Участие в международных олимпиадах</h5>
		</div>
html;

		if($_SESSION['login'] == 'admin'){
			for ($i=0;$i<$PortContestCount0;$i++){
echo 			<<<HTML

				<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
					<form method="post">
							<div >
								<a href="{$PortContestImg0[$i]}">
									<img alt="Грамота" src='{$PortContestImg0[$i]}' style='width:100%;' />
								</a>
							</div>

							<a onclick="isDelete('?del_id={$ArrayIDWithPlaceNull[$i]}')" style="width:100%"  class="btn btn-outline-secondary">Удалить</a>

					</form>
				</div>
HTML;
			}
		}else{
			for ($i=0;$i<$PortContestCount0;$i++){
echo 			<<<HTML
				<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
							<div >
								<a href="{$PortContestImg0[$i]}">
									<img alt="Грамота" src='{$PortContestImg0[$i]}' style='width:100%;' />
								</a>
							</div>
				</div>
HTML;
			}
		}

		echo <<<html
		<div class='list_section col-xs-6 col-sm-12 col-md-12 paddingNull'>
			<h5 class="contestHeaderText marginTopFivePercent">Участие во всероссийских конкурсах и олимпиадах</h5>
		</div>
html;

if($_SESSION['login'] == 'admin'){
	for ($i=0;$i<$PortContestCount1;$i++){
echo 			<<<HTML

		<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
			<form method="post">
					<div >
						<a href="{$PortContestImg1[$i]}">
							<img alt="Грамота" src='{$PortContestImg1[$i]}' style='width:100%;' />
						</a>
					</div>

					<a onclick="isDelete('?del_id={$ArrayIDWithPlaceOne[$i]}')" style="width:100%"  class="btn btn-outline-secondary">Удалить</a>

			</form>
		</div>
HTML;
	}
}else{
	for ($i=0;$i<$PortContestCount1;$i++){
echo 			<<<HTML
		<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
					<div >
						<a href="{$PortContestImg1[$i]}">
							<img alt="Грамота" src='{$PortContestImg1[$i]}' style='width:100%;' />
						</a>
					</div>
		</div>
HTML;
	}
}

		echo <<<html
		<div class='list_section col-xs-6 col-sm-12 col-md-12 paddingNull'>
			<h5 class="contestHeaderText marginTopFivePercent">Участие в областных и районных конкурсах и олимпиадах</h5>
		</div>
html;

if($_SESSION['login'] == 'admin'){
	for ($i=0;$i<$PortContestCount2;$i++){
echo 			<<<HTML

		<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
			<form method="post">
					<div >
						<a href="{$PortContestImg2[$i]}">
							<img alt="Грамота" src='{$PortContestImg2[$i]}' style='width:100%;' />
						</a>
					</div>

					<a onclick="isDelete('?del_id={$ArrayIDWithPlaceTwo[$i]}')" style="width:100%"  class="btn btn-outline-secondary">Удалить</a>

			</form>
		</div>
HTML;
	}
}else{
	for ($i=0;$i<$PortContestCount2;$i++){
echo 			<<<HTML
		<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
					<div >
						<a href="{$PortContestImg2[$i]}">
							<img alt="Грамота" src='{$PortContestImg2[$i]}' style='width:100%;' />
						</a>
					</div>
		</div>
HTML;
	}
}

		/*	echo <<<html
			<div class='list_section col-xs-6 col-sm-12 col-md-12 paddingNull'>
				<h5 class="contestHeaderText marginTopFivePercent">Участие в районных конкурсах</h5>
			</div>
html;


if($_SESSION['login'] == 'admin'){
	for ($i=0;$i<$PortContestCount3;$i++){
echo 			<<<HTML

		<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
			<form method="post">
					<div >
						<a href="{$PortContestImg3[$i]}">
							<img alt="Грамота" src='{$PortContestImg3[$i]}' style='width:100%;' />
						</a>
					</div>

					<a onclick="isDelete('?del_id={$ArrayIDWithPlaceThree[$i]}')" style="width:100%"  class="btn btn-outline-secondary">Удалить</a>

			</form>
		</div>
HTML;
	}
}else{
	for ($i=0;$i<$PortContestCount3;$i++){
echo 			<<<HTML
		<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
					<div >
						<a href="{$PortContestImg3[$i]}">
							<img alt="Грамота" src='{$PortContestImg3[$i]}' style='width:100%;' />
						</a>
					</div>
		</div>
HTML;
	}
}*/

		echo <<<html
		<div class='list_section col-xs-6 col-sm-12 col-md-12 paddingNull'>
			<h5 class="contestHeaderText marginTopFivePercent">Участие в конкурсах и олимпиадах техникума</h5>
		</div>
html;

if($_SESSION['login'] == 'admin'){
	for ($i=0;$i<$PortContestCount4;$i++){
echo 			<<<HTML

		<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
			<form method="post">
					<div >
						<a href="{$PortContestImg4[$i]}">
							<img alt="Грамота" src='{$PortContestImg4[$i]}' style='width:100%;' />
						</a>
					</div>

					<a onclick="isDelete('?del_id={$ArrayIDWithPlaceFour[$i]}')" style="width:100%"  class="btn btn-outline-secondary">Удалить</a>

			</form>
		</div>
HTML;
	}
}else{
	for ($i=0;$i<$PortContestCount4;$i++){
echo 			<<<HTML
		<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
					<div >
						<a href="{$PortContestImg4[$i]}">
							<img alt="Грамота" src='{$PortContestImg4[$i]}' style='width:100%;' />
						</a>
					</div>
		</div>
HTML;
	}
}
		?>
		</div>
	</div>
      </div>
  </div>
</body>
</html>
