<?php 
include "../conexion.php";

$nombre = $_POST['nombre'];
$dir = $_POST['dir'];
$telf=$_POST['telf'];
$tipo_doc=$_POST['tipo_doc'];
$num = $_POST['num'];
$estado=$_POST['estado'];

$actualizar_cliente="UPDATE cliente SET 
nombre_cli='$nombre',
telefono_cli='$telf',
 direccion_cli='$dir',
 tipodoc_cli='$tipo_doc',
  estado_cli='$estado'
WHERE DNI_cli= '$num'";

echo $resultado = $mysqli->query($actualizar_cliente);
?>
