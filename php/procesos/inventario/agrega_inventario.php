<?php
	include "../conexion.php";

	$nombre_inven = $_POST['nombre_inven'];
	$precio_inven = $_POST['precio_inven'];
	$fecha_inven = $_POST['fecha_inven'];
	$cantidad_inven = $_POST['cantidad_inven'];
	$estado1_inven = $_POST['estado1_inven'];
	$estado2_inven = $_POST['estado2_inven'];

	
	
	$buscar = $mysqli -> query ("SELECT * FROM inventario WHERE nombre LIKE '%$nombre_inven%'");
	if($n_buscar = mysqli_num_rows($buscar)>=1)
    {  
    	while($r_buscar = mysqli_fetch_assoc($q2))
        { 
            echo 'error';
        } 
    }
    else
    {
        $insertar = "INSERT INTO inventario (nombre, fecha_entrada, precio, cantidad, estado_01, estado_02) VALUES ('$nombre_inven', '$fecha_inven', '$precio_inven', '$cantidad_inven', '$estado1_inven', '$estado2_inven')";       
		echo $resultado = $mysqli->query($insertar);
	}        
?>