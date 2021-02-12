<div class="table table-hover table-responsive  p-0">

  <!--contenedor2-->
  <div class="card ">
    <!--esta es un card-->
    <?php
    include("../conexion.php");
    

    ?>
    <div class="table-responsive p-0 ">
              <table id="dttable_proveedores" class="table  table-bordered w-100 jumbotron ">
        <thead class="amber lighten-3">
          <tr>
            <td class="th-sm">nombre</td>
            <td class="th-sm">telefono</td>
            <td class="th-sm">direccion</td>
            <td class="th-sm">tipo documento</td>
            <td class="th-sm">#documento</td>
            <td class="th-sm">editar</td>
          </tr>

        </thead>

        <tbody>
          <?php
          $sql = "SELECT * from proveedores WHERE estado_pro=1";
          $result = mysqli_query($mysqli, $sql);
          //SELECT id_pro, nombre_pro, telefono_pro, direccion_pro, numerodoc_pro, estado_pro FROM proveedores
          foreach ($result as $mostrar) {
            $datos_prov = $mostrar["id_pro"] . "|" . $mostrar["nombre_pro"] . "|" . $mostrar["telefono_pro"] . "|" . $mostrar["direccion_pro"] . "|" . $mostrar["numerodoc_pro"] . "|" . $mostrar["tipodoc_pro"] . "|" . $mostrar["estado_pro"];
            // id_pro,nombre_pro,telefono_pro,direccion_pro,numerodoc_pro,tipodoc_pro,estado_pro
          ?>
            <tr>
              <td><?php echo $mostrar['nombre_pro'] ?></td>
              <td><?php echo $mostrar['telefono_pro'] ?></td>
              <td><?php echo $mostrar['direccion_pro'] ?></td>
              <td><?php echo $mostrar['tipodoc_pro'] ?></td>
              <td><?php echo $mostrar['numerodoc_pro'] ?></td>
              <td>
                <button type="button" class="btn btn-info p-1" data-toggle="modal" data-target="#basicExampleModal2" onclick="llenar_prov('<?php echo $datos_prov  ?>')">
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
    $('#dttable_proveedores').DataTable();
  });
</script>