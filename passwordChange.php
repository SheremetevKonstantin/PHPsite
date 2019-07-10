<?php
	session_start();
?>
<!doctype.html>
<html>
<head>
<title>Персональный сайт Мальцевой Веры Николаевны</title>
<meta charset=utf-8>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
	<body class="bodyFon">
		<div class="container">
			<div class="row">
				<div class="login">
			  <h1>Изменение пароля</h1>
			  <form method="post">
			    <div class="input">
			      <div class="blockinput">
			        <input type="password" name="oldPassword" placeholder="Введите текущий пароль" required>
			      </div>
			      <div class="blockinput">
							<input type="password" name="password" placeholder="Введите новый пароль" required>
			      </div>
						<div class="blockinput">
							<input type="password" name="passwordConfirm" placeholder="Подтвердите пароль" required>
			      </div>
			    </div>
			    <button type="submit" name="changePasswordBTN" class="btn btn-default">Сменить пароль</button>
			  </form>
			  </div>
		  </div>
		</div>
	</body>
</html>
<?php
if($_SESSION['login'] != "admin"){
	echo "<script>location.replace('/index.html');</script>";
}

if(isset($_POST['changePasswordBTN'])) {

	require_once("./assets/conn.php");

	$oldPassword = $_POST['oldPassword'];
	$newPassword = $_POST['password'];
	$passwordConfirm = $_POST['passwordConfirm'];
	if($newPassword != $passwordConfirm){
		echo <<<html
		<script>
		swal("Ошибка!", "Вводимые пароли не совпадают!", "error");
		</script>
html;
	}else{
		$query2 = "Select salt from login where login = 'admin';";//формирование запроса
		$result2 = mysqli_query($conn, $query2);
		$salt = mysqli_fetch_assoc($result2);
		$salt = $salt["salt"];

		$query3 = "Select password from login where login = 'admin';";//формирование запроса
		$result3 = mysqli_query($conn, $query3);
		$pas = mysqli_fetch_assoc($result3);
		$pas = $pas["password"];

		$hashPassword = myhash($oldPassword, $salt);//формирование старого пароля
		if($hashPassword != $pas){
			echo <<<html
			<script>
			swal("Ошибка!", "Введен неверный действующий пароль!", "error");
			</script>
html;
		}else{
			$pasToBase = myhash($newPassword, $salt);//формирование нового пароля
			$query = "Update login set password='$pasToBase' where salt = '$salt';";//формирование запроса
			$result = mysqli_query($conn, $query);
			if($result){
				echo <<<html
				<script>
				swal("Успех!", "Пароль был успешно изменен", "success")
				.then((value) => {
					location.replace('/index.html');
				});
				</script>
html;
			}else{
				echo <<<html
				<script>
				swal("Ошибка!", "Ппроизошла ошибка! Пароль не изменен.", "error")
				.then((value) => {
					location.replace('/index.html');
				});
				</script>
html;
			}
		}
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
