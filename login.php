<?php
	session_start();
	if(!empty($_SESSION['login']))
	{
		echo "<script>location.replace('/index.php');</script>";
	}
?>
<!doctype.html>
<html>
<head>
<title>Персональный сайт Мальцевой Веры Николаевны</title>
<meta charset=utf-8>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
	<body class="bodyFon">
		<div class="container">
			<div class="row">
				<div class="login">
			  <h1>Авторизация</h1>
			  <form method="post">
			    <div class="input">
			      <div class="blockinput">
			        <input type="text" name="login" placeholder="Логин" required>
			      </div>
			      <div class="blockinput">
							<input type="password" name="password" placeholder="Пароль" required>
			      </div>
			    </div>
			    <button type="submit" name="loginBTN" class="btn btn-default">Войти</button>
			  </form>

<!-- Виджет авторизации Вконтакте -->
<script type="text/javascript" src="https://vk.com/js/api/openapi.js?160"></script>
<script type="text/javascript">
  VK.init({apiId: 6993044});
</script>

<!-- VK Widget -->
<div id="vk_auth" style="width:100%;"></div>
<script type="text/javascript">
  VK.Widgets.Auth("vk_auth", {"width":'auto'});
</script>

			  </div>
		  </div>
		</div>
	</body>
</html>
<?php
if(!empty($_SESSION['login']))
{
	echo "<script>location.replace('/index.php');</script>";
}
else{
if(isset($_POST['loginBTN'])) {

require_once("./assets/conn.php");

$InputLogin = $_POST['login'];
$InputPassword = $_POST['password'];
$query = "Select password from login where login = '".$InputLogin."';";
$result = mysqli_query($conn, $query);
$pas = mysqli_fetch_assoc($result);

$query2 = "Select salt from login where login = '".$InputLogin."';";
$result2 = mysqli_query($conn, $query2);
$salt = mysqli_fetch_assoc($result2);


$salt = $salt["salt"];
$pas = $pas["password"];

if($pas == myhash($InputPassword,$salt)){
	$_SESSION['login']=$InputLogin;
		echo <<<html
			<script>
			swal("Успех!","Авторизация прошла успешно","success", {
  		buttons: false,
  		timer: 3000,
		}).then((value) => {
			location.replace('/index.php');
		});

			</script>
html;
}
else{
		echo <<<html
		<script>
		swal("Неудача!", "Неправильный логин или пароль!", "error")
		.then((value) => {
			location.replace('/login.php');
		});
		</script>
html;
}
}
else if($_GET['uid'] != null){
$_SESSION['login'] = $_GET['first_name'] . " " . $_GET['last_name'];
$_SESSION['photo'] = $_GET['photo_rec'];
echo <<<html
	<script>
	swal("Успех!", "Авторизация прошла успешно", "success")
	.then((value) => {
		location.replace('/index.php');
	});
	</script>
html;
}

}
	function myhash($passwd, $SALT) {
//хэширование пароля
			$hash = md5($SALT . $passwd);
//остановка на секунду
			sleep(1);
//возврат получившегося хэша
			return $hash;
	}
 ?>
