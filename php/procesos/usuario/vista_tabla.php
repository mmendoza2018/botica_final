<table id="example" class=" table table-hover table-responsive jumbotron p-0" >
                <thead class="amber lighten-3">
                   <tr>
                        <th >Nombres </th>
                        <th >Telefono</th>
                        <th >Direccion</th>
                        <th >tipo usuario</th>
                        <th >editar</th>

                    </tr>
                </thead>
                <tbody>

                   <?php
                   include("../conexion.php");
               

                  $usuario_con="SELECT * FROM usuarios WHERE estado_u=1";
                  $res_usu=mysqli_query($mysqli,$usuario_con);
                  foreach ($res_usu as $row) {
                    $datos_usuario=$row["nombre_u"]."|".$row["telefono_u"]."|".$row["direccion_u"]."|".$row["tipo_u"]."|".$row["id_u"]."|".$row["estado_u"];
                    ?>

                        <tr>
                          <td><?php  echo $row["nombre_u"] ?></td>
                          <td><?php  echo $row["telefono_u"] ?></td>
                          <td><?php  echo $row["direccion_u"] ?></td>
                          <td><?php  echo $row["tipo_u"] ?></td>
                          <td class="p-1 text-center"><button class="btn btn-info p-1" onclick="llenar_usuario('<?php echo $datos_usuario; ?>')" data-target="#miModal" data-toggle="modal" ><i class="fas fa-user-edit"></i></button></td>
                        </tr>
               <?php
                  }

                   ?>



                </tbody>

            </table>
            <script type="text/javascript">
			$(document).ready(function() {
    $('#example').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });
} );
</script>
