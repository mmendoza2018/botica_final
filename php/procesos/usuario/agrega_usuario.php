<?php 
require("../conexion.php");
$id_usu_ag=$_POST["id_usu_ag"];
$nom_usu_ag=$_POST["nom_usu_ag"];
$telf_usu_ag=$_POST["telf_usu_ag"];
$dir_usu_ag=$_POST["dir_usu_ag"];
$tipo_usu_ag=$_POST["tipo_usu_ag"];
$contra_usu_ag=$_POST["contra_usu_ag"];
//id_usu_ag,nom_usu_ag,telf_usu_ag,dir_usu_ag,tipo_usu_ag,contra_usu_ag

 $encriptacion = password_hash($contra_usu_ag,PASSWORD_DEFAULT);
 $agrega_usuario= "INSERT INTO usuarios( id_u,
                                        nombre_u,	
                                        telefono_u,	
                                        direccion_u,		
                                        contra_u,	
                                        tipo_u) 
                         VALUES ('$id_usu_ag','$nom_usu_ag','$telf_usu_ag',
                        '$dir_usu_ag','$encriptacion','$tipo_usu_ag')";

  echo $result_add_usuario = mysqli_query($mysqli,$agrega_usuario);  

?>