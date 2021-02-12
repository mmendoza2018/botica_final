<?php
include("../conexion.php");

$nom_usu_ac=$_POST["nom_usu_ac"];
$telf_usu_ac=$_POST["telf_usu_ac"];
$dir_usu_ac=$_POST["dir_usu_ac"];
$tipo_usu_ac=$_POST["tipo_usu_ac"];
$id_usu_ac=$_POST["id_usu_ac"];
$estado_usu_ac=$_POST["estado_usu_ac"];




 // contacto2,telf2,correo2,pago2,validez2,entrega2,servicio2,moneda2,e01,e02
 $actualizar_usuario="UPDATE usuarios SET nombre_u='$nom_usu_ac',
                                                telefono_u='$telf_usu_ac',
                                                direccion_u='$dir_usu_ac',
                                                tipo_u='$tipo_usu_ac',
                                                estado_u='$estado_usu_ac' WHERE id_u= '$id_usu_ac'";
echo $result_ac_usu01 = mysqli_query($mysqli,$actualizar_usuario);





?>
