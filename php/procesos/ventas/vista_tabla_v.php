<div class="table-responsive p-0 ">
  <table id="dttable_ventas" class="table table-striped table-bordered w-100 ">
    <thead class="amber lighten-3">
      <tr>
        <td class="th-sm">Nro CP</td>
        <td class="th-sm">Cliente</td>
        <td class="th-sm">Vendedor</td>
        <td class="th-sm">Total</td>
        <td class="th-sm">Fecha</td>
        <td class="th-sm">Detalle</td>
        <td class="th-sm">PDF</td>
        <td class="th-sm">Desactivar</td>
                          <!--<td class="th-sm">Ticket</td>
                          <td class="th-sm">Pdf</td>
                          <td class="th-sm">Editar</td>-->
                        </tr>

                      </thead>

                      <tbody>

                       <?php
                       session_start();
                       include("../conexion.php");
                       ?>
                       <?php
                       $sql = "SELECT * from ventas INNER JOIN cliente on ventas.dni_c=cliente.DNI_cli WHERE estado_v=1";
                       $result = mysqli_query($mysqli, $sql);

                       foreach ($result as $mostrar) {
                        $datos_v = $mostrar["id_venta"] . "|" . $mostrar["dni_c"] . "|" . $mostrar["parcial"] . "|" . $mostrar["descuento"] . "|" . $mostrar["neto"] . "|" . $mostrar["total"]. "|" . $mostrar["usuario"]. "|" . $mostrar["fecha_v"];

                        ?>

                        <tr>
                          <td><?php echo $mostrar['id_venta'] ?></td>
                          <td><?php echo $mostrar['nombre_cli'] ?></td>
                          <td><?php echo $mostrar['usuario']?></td> <!--vendedor-->
                          <td><?php echo $mostrar['total'] ?></td> <!--total-->
                          <td><?php echo $mostrar['fecha_v'] ?></td> <!--fecha-->
                          <td><button type="button" class="btn btn-info p-1" data-toggle="modal" data-target="#detalle_v" onclick="enviar_idv('<?php echo $mostrar["id_venta"] ?>')">
                            <i class="fas fa-ticket-alt"></i>
                          </button>
                        </td>
                        <td><button type="button" class="btn btn-info p-1" data-toggle="modal" data-target="#" onclick="generarPDF('<?php echo $mostrar["id_venta"] ?>', '<?php echo $mostrar['usuario']?>', '<?php echo $mostrar['fecha_v'] ?>')">
                          <i class="fas fa-file-pdf"></i>
                        </button>
                      </td>
                      <td><button type="button" class="btn btn-info p-1" data-toggle="modal" data-target="#desact_bo" onclick="desactivar_bo('<?php echo $mostrar["id_venta"] ?>')">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </td>
                  </tr>
                  <?php
                }?>
                         <!--modal
                            <button type="button" class="btn btn-info p-1" data-toggle="modal" data-target="#detalle_v">
                            <i class="fas fa-ticket-alt"></i>
                          </button>-->
                        </tbody>
                      </table>
                     


                    </div>

 <!-- The Modal detalle venta-->
                      <div class="modal" id="detalle_v">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Detalle de venta</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" id="llega_dv">





                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                          </div>
                        </div>
                      </div>

                    <!-- MODAL desactivar boleta -->

                    <!-- The Modal -->
                    <div class="modal" id="desact_bo">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Desactivar Boleta</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body" id="des_bo">
                            <!-- Default checked -->
                            
                            
                          </div>

                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="">Salir</button>
                          </div>

                        </div>
                      </div>
                    </div>

<script type="text/javascript">
      $(document).ready(function() {
    $('#dttable_ventas').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });
} );
</script>