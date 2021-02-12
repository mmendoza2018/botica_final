<div class="table table-hover table-responsive  p-0">


<div class="table-responsive p-0 ">
          <table id="dttable_proveedores" class="table  table-bordered w-100 jumbotron ">
    <thead class="amber lighten-3">
      <tr>
        <td class="th-sm">id</td>
        <td class="th-sm">Fecha</td>
        <td class="th-sm">total</td>
      </tr>

    </thead>

    <tbody>
<?php 
session_start();
require_once("../conexion.php");
$sumat_d=0;

date_default_timezone_set("America/Bogota");
$hoy = date("Y-m-d");
//Incrementando 2 dias
$con_detalle_dia="SELECT * FROM ventas WHERE fecha_v='$hoy'";
 $res_con_detalle_dia=mysqli_query($mysqli,$con_detalle_dia);
 foreach ($res_con_detalle_dia as $x) { 
    $sumat_d+=$x['total'];
     ?>
          <tr>
            <td><?php echo $x['id_venta'] ?></td>
            <td><?php echo $x['fecha_v'] ?></td>
            <td><?php echo $x['total'] ?></td>
          </tr>
        <?php
        }
        ?>
        <tr>
            <td></td>
            <td></td>
            <td><?php  echo $_SESSION["r_diario"] = $sumat_d; ?></td>
            
          </tr>
      </tbody>
    </table>
</div>
</div>
 