<?php 
require("../conexion.php");
session_start();
$usuario=$_SESSION["nom_usuario"];
$dato_ve=$_POST["sel_nombre"];
$datos_v=$_SESSION["datos_venta"];
date_default_timezone_set("America/Bogota");
$date = date("Y-m-d");
$d=explode("|",$datos_v);
$filas_v=0;
$total=0;


	$con_insertar_v="INSERT INTO ventas (dni_c,parcial,descuento,neto,total,usuario,fecha_v) 
					VALUES ('$dato_ve','$d[1]','$d[3]','$d[0]','$d[2]','$usuario','$date')";
				$res_con_insertar_v=mysqli_query($mysqli,$con_insertar_v);


					$nro_boleta="SELECT * FROM ventas";
					$resp_nv=mysqli_query($mysqli,$nro_boleta);
					$filas_v=$resp_nv->num_rows;

            if(isset($_SESSION['datos'])){
              foreach ($_SESSION['datos'] as $row) {
                $a=explode("|", $row);
                   // $a[0];//nombre
                   // $a[0];//cantidad
				   // $a[1];// precio
				   // $a[3] // id_articulo
				   $total=$a[0]*$a[1];
			//insert
			$con_insertar="INSERT INTO det_venta (id_v01,id_art01,cantidad_dv,precio_dv,total_dv) 
						   VALUES ('$filas_v','$a[4]','$a[0]','$a[1]','$total')";
			echo $res_con_insertar=mysqli_query($mysqli,$con_insertar);
			} 
			unset($_SESSION['datos']);
		//echo  $res;
		}
                else{
                    echo " ";
				}
				
    

?>