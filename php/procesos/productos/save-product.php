<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "botica";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id_art = $_POST['id'];
$nombre_art = $_POST['nombre'];
$descripcion_art = $_POST['descripcion'];
$id_cat01 = $_POST['categoria'];
$id_pro01 = $_POST['proveedor'];
$vencimiento_art = $_POST['vencimiento'];
$cantidad_art = $_POST['cantidad'];
$precio_art = $_POST['precio'];
$estado_art = $_POST['estado'];

if($_POST['id'] == null || $_POST['id'] == ''){
  $sql = "INSERT INTO articulos 
          VALUES (NULL, '$nombre_art', '$descripcion_art', '$id_cat01', '$id_pro01', 
          '$vencimiento_art', '$cantidad_art', '$precio_art', '$estado_art')";
}
else{
  $sql = "UPDATE articulos SET nombre_art='$nombre_art', 
  descripcion_art='$descripcion_art',id_cat01='$id_cat01',id_pro01='$id_pro01',vencimiento_art='$vencimiento_art',
  cantidad_art='$cantidad_art',precio_art='$precio_art',estado_art='$estado_art' WHERE id_art='$id_art'";
}

if ($conn->query($sql) === TRUE) {
  echo json_encode(true);
} else {
  echo json_encode(false);
}

$conn->close();
?> 