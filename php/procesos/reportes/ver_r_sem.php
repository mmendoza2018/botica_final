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
$sumat=0;

date_default_timezone_set("America/Bogota");
$hoy = date("Y-m-d");
//Incrementando 2 dias
$mod_date = strtotime($hoy."- 7 days");
$antes=date("Y-m-d",$mod_date) . "\n";
$con_detalle_sem="SELECT * FROM ventas WHERE fecha_v>='$antes' AND fecha_v<='$hoy'";
 $res_con_detalle_sem=mysqli_query($mysqli,$con_detalle_sem);
 foreach ($res_con_detalle_sem as $x) { 
    $sumat+=$x['total'];
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
            <td><?php  echo $_SESSION["r_semana"] = $sumat; ?></td>
            
          </tr>
      </tbody>
    </table>
</div>
</div>
 