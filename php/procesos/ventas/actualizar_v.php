<?php 
require "../conexion.php";
if(isset($_POST["switch_dev"])){
	echo 2;

}
else{
	/*$datos_sdev=$_POST["switch_dev"];*/
	$datos_idv=$_POST["id_dev"];

	$consulta_db= "UPDATE ventas SET estado_v=0 where id_venta='$datos_idv'";
	echo $resp=mysqli_query($mysqli,$consulta_db);
}


?>