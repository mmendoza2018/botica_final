<?php 
include "../conexion.php";

$id=$_POST['id'];
$nombre = $_POST['nombre'];
$dir = $_POST['dir'];
$telf=$_POST['telf'];
$tipo_doc=$_POST['tipo_doc'];
$num = $_POST['num'];
$estado=$_POST['estado'];

$actualizar_pro="UPDATE proveedores SET 
nombre_pro='$nombre',
telefono_pro='$telf',
 direccion_pro='$dir',
  numerodoc_pro='$num', 
 tipodoc_pro='$tipo_doc',
  estado_pro='$estado'
WHERE id_pro = '$id'";

echo $resultado = $mysqli->query($actualizar_pro);




?>