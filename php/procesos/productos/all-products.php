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



$sql = "SELECT *,categorias.nombre_cat AS categoria, categorias.id_cat FROM articulos INNER JOIN categorias ON articulos.id_cat01 = categorias.id_cat WHERE estado_art=1";
$result = $conn->query($sql);



$output = [];

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $fecha_vencimiento1= $row["vencimiento_art"];
    /*----------------*/
    date_default_timezone_set("America/Lima");
               $fecha_actual1 = date("Y-m-d");
                //echo $fecha_actual1;
                           
               $datos=calcula_tiempo($fecha_vencimiento1,$fecha_actual1);
               if($datos[11]<=90){
                $vence= "vencera en " . $datos[11] ." dias";
              // $vence= <button type="button" class="btn btn-danger"> echo "vencera en " . $datos[11] ." dias";  </button>
               }
              elseif($datos[1]<=8 ){
               
                $vence= "vencera en " . $datos[1] ." meses"; 
              }
               elseif($datos[1]>=9){
                
                $vence= "vencera en " . $datos[1] ." meses"; 
               }
     $row += [ "vencimiento" => $vence  ];
    //echo $row["vencimiento"];
    array_push($output, $row) ;
    
    //$num=["uno"=>1,"dos"=>2];

    //echo $row["vencimiento_art"];
    

    /*----------------*/
  } /*echo "<pre>";
  echo var_dump ($output);
  echo "</pre>";*/
} else {
  echo json_encode([]);
}

$output = array('data' => $output);

echo json_encode($output);

$conn->close();

function calcula_tiempo ($fecha_vencimiento,$fecha_actual){
  $datetime1 = date_create($fecha_vencimiento);
  $datetime2 = date_create($fecha_actual);
  $interval = date_diff($datetime1, $datetime2);
  $tiempo=array();
  foreach ($interval as $valor){
  $tiempo[]=$valor;
  }
  return $tiempo;
 }
?>
