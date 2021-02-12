<div class="table table-hover table-responsive jumbotron p-0 m-0" id="boletaPDF">

  <!--contenedor2-->
  <div class="card"><!--esta es un card-->

    <div class="container">

      <div class="table-responsive p-0 ">

        <table id="dttable_dventas" class="table table-striped table-bordered w-100 ">

          <thead class="amber lighten-2">

            <tr>

              <td class="th-sm">Id de venta</td>
              <td class="th-sm">Nombre Producto</td>
              <td class="th-sm">Cantidad</td>
              <td class="th-sm">Precio</td>
              <td class="th-sm">Total</td>
              <td class="th-sm">Usuario</td>
              <td class="th-sm">Cliente</td>

            </tr>

          </thead>

          <tbody>
           <tr>
             <?php
             require("../conexion.php");
             $id_dv=$_POST["id_v"];


             $sql = "SELECT * from det_venta INNER JOIN ventas on det_venta.id_v01=ventas.id_venta 
             INNER JOIN articulos on det_venta.id_art01=articulos.id_art 
             INNER JOIN cliente on ventas.dni_c=cliente.DNI_cli
             WHERE det_venta.id_v01='$id_dv'";
             $result = mysqli_query($mysqli, $sql);
             foreach ($result as $mostrar) {
              $datos_dv = $mostrar["id_v01"] . "|" . $mostrar["id_art01"] . "|" . $mostrar["cantidad_dv"] . "|" . $mostrar["precio_dv"] . "|" . $mostrar["total_dv"];
              ?> 
              <tr>
                <td>
                  <?php echo $mostrar['id_v01']?>

                </td>
                <td>
                  <?php echo $mostrar['nombre_art']?> <!---nombre del producto--->
                </td>

                <td>
                  <?php echo $mostrar['cantidad_dv']?>

                </td>
                <td>
                  <?php echo $mostrar['precio_dv']?>

                </td>
                <td>
                  <?php echo $mostrar['total_dv']?>

                </td>
                <td>
                  <?php echo $mostrar['usuario']?>
                </td>
                <td>
                  <?php echo $mostrar['nombre_cli']?>
                </td>
              </tr>




              <?php
            }?>



            


            
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>
</div>