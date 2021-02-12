
<div class="table table-hover table-responsive  p-0">

<!--contenedor2-->
<div class="card ">
  <!--esta es un card-->
  <?php
  include("../conexion.php");
  

  ?>
  <div class="table-responsive p-0 ">
<table id="dttable_inventario" class="table  table-bordered w-100 jumbotron ">
        <thead class="amber lighten-3">
          <tr>
            <td class="th-sm">nombre</td>
            <td class="th-sm">Precio</td>
            <td class="th-sm">Cantidad</td>
            <td class="th-sm">Estado 1</td>
            <td class="th-sm">Estado 2</td>            
           
          </tr>

        </thead>
        
        <tbody>
    <?php
    include("../conexion.php");
    ?>

        
          <?php
          $sql = "SELECT * from inventario";
          $result = mysqli_query($mysqli, $sql);
         
          foreach ($result as $mostrar) {

            $datos_cliente = $mostrar["nombre"] . "|" . $mostrar["precio"] . "|" . $mostrar["cantidad"] . "|" . $mostrar["estado_01"] . "|" . $mostrar["estado_02"];

            $condicion = $mostrar["estado_02"];

            if ($condicion == 'Inactivo') {
              $pintado = 'style=" background: #e4c4c4;"';
            }else{
              $pintado = '';
            }

          ?>
            <tr <?php echo $pintado ?>>
              <td><?php echo $mostrar['nombre'] ?></td>
              <td style="text-align: right;"> <?php echo number_format($mostrar['precio'] , 2, ',', ' ')?></td>
              <td><?php echo $mostrar['cantidad'] ?></td>
              <td><?php echo $mostrar['estado_01'] ?></td>
              <td><?php echo $mostrar['estado_02'] ?></td>
              
              
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#dttable_inventario').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }

    });
  });
</script>