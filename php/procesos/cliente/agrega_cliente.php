<?php
include "../conexion.php";
	/* nombre_p, direccion_p, numero_p, tipodoc_p, numero_d*/
	$nombre_c = $_POST['nombre_c'];
	$direccion_c = $_POST['direccion_c'];
	$tel_c=$_POST['tel_c'];
	$tipodoc_c=$_POST['tipodoc_c'];
	$numero_c=$_POST['numero_c'];
	
	
	//echo "hola".$nombre_p." ".$direccion_p." ".$numero_p." ".$numero_d;
	$insertar = "INSERT INTO cliente(nombre_cli, telefono_cli, direccion_cli, DNI_cli, tipodoc_cli) 
	VALUES ('$nombre_c','$tel_c','$direccion_c','$numero_c','$tipodoc_c')";
	//$resultado=$mysqli->query($insertar);
	 echo $resultado = $mysqli->query($insertar);
	

?>