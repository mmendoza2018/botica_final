<?php 
		session_start();

     $datos_art=$_POST["dato"];
	
	
     /*$porciones = explode("|", $datos_art);
     echo $porciones[0]; // porción1
     echo $porciones[1]; // porción2
*/
     //$datos=$id_cot02.",".$id.",".$tipo.",".$c.",".$dn.",".$dt.",".$p;

	$_SESSION['datos'][]= $datos_art;

	
?>
           
	
	



