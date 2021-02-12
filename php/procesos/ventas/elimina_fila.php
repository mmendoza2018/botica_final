<?php 
	session_start();

	$datos = $_POST["dato"];

	unset($_SESSION['datos'][$datos]);

	$array = array_values($_SESSION['datos']);

	unset($_SESSION['datos']);

	$_SESSION['datos']=$array;

 ?>