<?php
	$host = "localhost";
  	$login = "root";
  	$passwd = "";
  	$db = "MaltsevaSite";
	

  	$conn = mysqli_connect($host, $login, $password, $db);

  	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
      exit;
  	}

?>