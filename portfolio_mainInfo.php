<?php
session_start();
?>
<!doctype.html>
<html>
<head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require_once("./assets/conn.php");

$query = "SELECT COUNT(id) FROM portfolio_rewardsMain;";
$result = mysqli_query($conn, $query);
$PortRewardsMainCount = mysqli_fetch_assoc($result);
$PortRewardsMainCount = $PortRewardsMainCount["COUNT(id)"];

$query2 = "SELECT img from portfolio_rewardsMain;";
$result2 = mysqli_query($conn,$query2);
$array1ImgMain = array();
while ($row = $result2->fetch_array())
	$array1ImgMain[] = $row[0];

$query2 = "SELECT id from portfolio_rewardsMain;";
$result2 = mysqli_query($conn,$query2);
$arrayIdImgMain = array();
while ($row = $result2->fetch_array())
	$arrayIdImgMain[] = $row[0];

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
				<h2 class="mainInfoMainText">Мальцева Вера Николаевна</h2>
				<h4 class="mainInfoUnderText">преподаватель математики и математических дисциплин</h4>
				<h4 class="mainInfoUnderText" style="margin-bottom:30px;">ГБПОУ «Заволжский автомоторный техникум»</h4>
				<p class="textFormat">	Образование высшее, в 1985 году окончила Нижегородский государственный университет им. Н.И. Лобачевского, механико – математический факультет.
				Общий стаж педагогической работы составляет 34 лет, в системе ПОО в «Заволжском автомоторном техникуме» работаю с 1985 года.
				Являюсь преподавателем высшей квалификационной категории.</p>
				<h4 class="mainInfoHeaderText">Преподаваемые дисциплины</h4>
				<ol class="num-list">
					<li class="mainInfoLi"><span>-</span>ОУД.04 Математика, алгебра, начала математического анализа, геометрия</li>
					<li class="mainInfoLi"><span>-</span>ОП.13 Численные и математические методы</li>
				</ol>
				<h4 class="mainInfoHeaderText">Принципы, которых я придерживаюсь в своей профессиональной деятельности</h4>
					<div class="incut">
Безграмотными в 21 веке будут не те, кто не умеет читать и писать, а те, кто не умеет учится, разучиваться и переучиваться.
					</div>
					<div class="incut">
Учить всех, учить каждого.
					</div>
				<h4 class="mainInfoHeaderText">Цели</h4>
				<ol class="num-list">
					<li class="mainInfoLi"><span>1</span>Обеспечение профессиональной подготовки будущих специалистов</li>
					<li class="mainInfoLi"><span>2</span>Формирование у обучающихся ОК и ПК, обеспечивающих развитие у них способности к самообразованию, самоуправлению и саморазвитию</li>
					<li class="mainInfoLi"><span>3</span>Формирование и развитие ПК, соответствующих основным видам профессиональной деятельности</li>
				</ol>
				<h4 class="mainInfoHeaderText">Задачи</h4>
				<ol class="num-list">
					<li class="mainInfoLi"><span>1</span>Мотивация обучающихся к освоению учебных дисциплин</li>
					<li class="mainInfoLi"><span>2</span>Развитие познавательных способностей и активности студентов: творческой инициативы, самостоятельности, ответственности и организованности</li>
					<li class="mainInfoLi"><span>3</span>Содействие гармоничному творческому развитию субъектов образования</li>
					<li class="mainInfoLi"><span>4</span>Создание условий для формирования и развития ОК и ПК</li>
					<li class="mainInfoLi"><span>5</span>Создание условий для формирований способности обучающихся к самообразованию, самоуправлению и саморазвитию</li>
				</ol>
				<p class="textFormat">С 2013 года являюсь председателем предметно-цикловой комиссии «Естественно научных дисциплин».
		В 2014 – 2016 гг. работала в творческой группе «Бально-накопительная система оценок в СПО».</p>
			<div class="list_section col-xs-6 col-sm-12 col-md-12">
					<iframe class="mainInfoVideo" width="100%" height="500" src="https://www.youtube.com/embed/9p42mbLQjso" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
			</div>
				<?php
				echo <<<html
				<div class='list_section col-xs-6 col-sm-12 col-md-12 headerText'>
						<h2 class="textAlighInCenter display-4">Основные награды и благодарности</h2>
				</div>
html;
				if($_SESSION['login'] == 'admin'){
				echo <<<html
				<div style="width: 100%;" class="addOrEditDiv">
				<h3 class="textAlighInCenter">Добавление фотографии </h3>
				<form  method=post enctype=multipart/form-data>
				<h4>Выберите картинку </h4>
				<input style="    margin: 2%;" type=file name=uploadfile>
				<button type=submit name="addImgMainBTN" class="btn btn-default">Добавить</button></form>
				</div>
html;
				}

				if(isset($_POST['addImgMainBTN'])){
				$uploaddir = './img/portfolio/rewardsMain/';//назначение дириктории загрузки
				if($_FILES['uploadfile']['name'] == ''){
					echo <<<html
					<script>
					swal("Предупреждение!", "Фотография не была выбрана!", "warning");
					</script>
html;
				}else{
					$uploadfile = $uploaddir.basename(uploadImage($_FILES['uploadfile'],$uploaddir));//формирование пути файла
					$sql = "Insert into portfolio_rewardsMain (img) values ('$uploadfile');";//формирование запроса
					$result = mysqli_query($conn, $sql);
					if($result){
						echo <<<html
						<script>
						swal("Успех!", "Фотография была успешно добавлена", "success")
						.then((value) => {
							location.replace('/portfolio_mainInfo.php');
						});
						</script>
html;
					}else{
						echo <<<html
						<script>
						swal("Неудача!", "Ошибка при добавлении", "error")
						.then((value) => {
							location.replace('/portfolio_mainInfo.php');
						});
						</script>
html;
						}
					}
				}

				if($_SESSION['login'] == 'admin'){
					for ($i=0;$i<$PortRewardsMainCount;$i++){
	echo 			<<<HTML
						<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
							<form method="post">
									<div >
										<a href="{$array1ImgMain[$i]}">
											<img alt="Основная грамота" src='{$array1ImgMain[$i]}' style='width:100%;' />
										</a>
									</div>

									<a onclick="isDelete('?del_imgMain_id={$arrayIdImgMain[$i]}')" style="width:100%"  class="btn btn-outline-secondary">Удалить</a>

							</form>
						</div>
HTML;
					}
				}else{
					for ($i=0;$i<$PortRewardsMainCount;$i++){
	echo 			<<<HTML
						<div class='list_section col-xs-6 col-sm-6 col-md-4 photosBlock'>
									<div >
										<a href="{$array1ImgMain[$i]}">
											<img alt="Основная грамота" src='{$array1ImgMain[$i]}' style='width:100%;' />
										</a>
									</div>
						</div>
HTML;
					}
				}
								if(!empty($_GET['del_imgMain_id'])){
									$id_del = $_GET['del_imgMain_id'];
									$sql = "Delete from portfolio_rewardsMain  Where id = {$id_del}";//формирование запроса
									$result = mysqli_query($conn, $sql);
									if($result){
										echo <<<html
										<script>
										swal("Успех!", "Успешно удалено", "success")
										.then((value) => {
											location.replace('/portfolio_mainInfo.php');
										});
										</script>
html;
									}else{
										echo <<<html
										<script>
										swal("Неудача!", "Ошибка при удалении", "error")
										.then((value) => {
											location.replace('/portfolio_mainInfo.php');
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
