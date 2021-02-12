
<div class="table table-hover table-responsive  p-0">

<!--contenedor2-->
<div class="card ">
  <!--esta es un card-->
  <?php
  include("../conexion.php");
  

  ?>
  <div class="table-responsive p-0 ">
<table id="dttable_cliente" class="table  table-bordered w-100 jumbotron ">
        <thead class="amber lighten-3">
          <tr>
            <td class="th-sm">nombre</td>
            <td class="th-sm">tipo documento</td>
            <td class="th-sm">#documento</td>
            <td class="th-sm">telefono</td>
            <td class="th-sm">direccion</td>
            
            <td class="th-sm">editar</td>
          </tr>

        </thead>
        
        <tbody>
    <?php
    include("../conexion.php");
    ?>

        
          <?php
          $sql = "SELECT * from cliente WHERE estado_cli=1";
          $result = mysqli_query($mysqli, $sql);
         
          foreach ($result as $mostrar) {
            $datos_cliente = $mostrar["DNI_cli"] . "|" . $mostrar["nombre_cli"] . "|" . $mostrar["telefono_cli"] . "|" . $mostrar["direccion_cli"] . "|" . $mostrar["tipodoc_cli"] . "|" . $mostrar["estado_cli"];
          
          ?>
            <tr>
              <td><?php echo $mostrar['nombre_cli'] ?></td>
              <td><?php echo $mostrar['tipodoc_cli'] ?></td>
              <td><?php echo $mostrar['DNI_cli'] ?></td>
              <td><?php echo $mostrar['telefono_cli'] ?></td>
              <td><?php echo $mostrar['direccion_cli'] ?></td>
              
              <td>
                <button type="button" class="btn btn-info p-1" data-toggle="modal" data-target="#modalCliente" onclick="llenar_cliente('<?php echo $datos_cliente ?>')">
                  <i class="fas fa-user-edit"></i>
                </button>
              </td>
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
    $('#dttable_cliente').DataTable({
      "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }

    });
  });
</script>