<?php
	session_start();//начало сессии
	session_unset();//удаление всех переменных сессии
	session_destroy();//уничтожение сесии
	echo "<script>location.replace('index.php');</script>";
	exit;
?>
