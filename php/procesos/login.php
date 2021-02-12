<?php
session_start();// declaramos la sesion 
include "conexion.php";
$usuario = $_POST['user'];
$password = $_POST['pass'];
$password_2="";
$id_u=0;


//$busqueda_1 = $mysqli -> query ("SELECT * FROM usuarios WHERE id_u = '$usuario'"); //para ver si existe el usuario
$sentencia =$mysqli->prepare("SELECT * FROM usuarios WHERE id_u = ? ");
$sentencia->bind_param("s", $usuario  );
$sentencia->execute();
$res=$sentencia->get_result();
$filas=$res->num_rows;

if ($filas>0) {

    foreach ($res as $r) {
        $password_2=$r["contra_u"];
        $nombre=$r["nombre_u"];
        $id=$r["id_u"];
        $tipou=$r["tipo_u"];
    }
  
if (password_verify($password,$password_2)) {// el metodo recibe dos parametros la que llega del form y la de la base de datos 
    echo 1; // hay similitud con las contraseñas devuelve 1 al js 
    $_SESSION["nom_usuario"]=$nombre;// creamos una session 
    $_SESSION["id_usuario"]=$id;
    $_SESSION["tipo_user"]=$tipou;
    
}else{
 echo 2;
}
}
else{
    echo 3;
}
?>