<?php
session_start();
require_once("php/procesos/conexion.php");

if (isset($_SESSION["id_usuario"])) {


?>
  <!DOCTYPE html>
  <html lang="en">
  <?php
  require("vistas/componentes/header.html");
  ?>
  <style>
    .nav-pills .nav-link.active,
    .show>.nav-pills .nav-link {
      background: palegreen !important
    }
  </style>

  <body>

    <!--Navbar -->
    <nav class="mb-1 navbar navbar-expand-lg navbar-dark success-color lighten-1 p-0 pl-2">
      <a class="navbar-brand" href="#">botica</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555" aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent-555">

        <ul class="navbar-nav ml-auto nav-flex-icons">

          <li class="nav-item avatar dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="https://i.pinimg.com/736x/49/c8/e4/49c8e403cd1929e9e7b02126824ff831.jpg" width="40" height="40" class="rounded-circle z-depth-0" alt="avatar image">
            </a>
            <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
              <a class="dropdown-item" href="php/procesos/session_destroy.php"><i class="fas fa-window-close red-text"></i> Cerrar Sesion</a>
              <a class="dropdown-item" href="#"><?php echo $_SESSION["nom_usuario"]; ?></a>
              <a class="dropdown-item" href="#">mas..</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!--/.Navbar -->
    <div class="container-fluid pt-2">
      <div class="row">
        <div class="col-sm-1 p-0"></div>
        <div class="col-xl-10 p-0 jumbotron ">
          <ul class="nav nav-pills mb-3 nav-justified  border grey lighten-2" id="pills-tab" role="tablist">
            <li class="nav-item border-right border-success">
              <a class="nav-link active text-dark" id="pills-reportes-tab" data-toggle="pill" href="#pills-reportes" role="tab" aria-controls="pills-home" aria-selected="true">RESPORTES</a>
            </li>
            <li class="nav-item border-right border-success">
              <a class="nav-link text-dark" id="pills-ventas-tab" data-toggle="pill" href="#pills-ventas" role="tab" aria-controls="pills-profile" aria-selected="false">VENTAS</a>
            </li>
            <li class="nav-item border-right border-success">
              <a class="nav-link text-dark" id="pills-productos-tab" data-toggle="pill" href="#pills-productos" role="tab" aria-controls="pills-contact" aria-selected="false">PRODUCTOS</a>
            </li>
           
            <li class="nav-item border-right border-success">
              <a class="nav-link text-dark" id="pills-proveedores-tab" data-toggle="pill" href="#pills-proveedores" role="tab" aria-controls="pills-profile" aria-selected="false">PROVEEDORES</a>
            </li>
            <li class="nav-item border-right border-success">
              <a class="nav-link text-dark" id="pills-usuarios-tab" data-toggle="pill" href="#pills-usuarios" role="tab" aria-controls="pills-contact" aria-selected="false">USUARIOS</a>
            </li>
            <li class="nav-item border-right border-success">
              <a class="nav-link text-dark" id="pills-inventario-tab" data-toggle="pill" href="#pills-inventario" role="tab" aria-controls="pills-contact" aria-selected="false">INVENTARIO</a>
            </li>
            <li class="nav-item border-right border-success">
              <a class="nav-link text-dark" id="pills-clientes-tab" data-toggle="pill" href="#pills-clientes" role="tab" aria-controls="pills-contact" aria-selected="false">CLIENTES</a>
            </li>
          </ul>
          <div class="tab-content pt-2 pl-1" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-reportes" role="tabpanel" aria-labelledby="pills-reportes-tab">
            <div id="llega_reporte"></div>
            </div>
            <div class="tab-pane fade" id="pills-ventas" role="tabpanel" aria-labelledby="pills-ventas-tab">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Registrar
              </button>

              <div class="table table-hover table-responsive jumbotron p-0 m-0">

                <!--contenedor2-->
                <div class="card ">
                  <!--esta es un card-->

                  <div class="container" id="tabla_ven">


                  </div>
                </div>
              </div>


              <!-- The Modal -->
              <div class="modal fade" id="myModal_editar_vetas">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Registro de venta</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <!--Modal body..-->
                      <div class="container">
                        <div class="row">
                          <div class="col-md-6">
                            <!--.col-md-8-->
                            <div class="card">
                              <!--card-->
                              <div class="container">
                                <!--contenedor-->
                                <div class="container">
                                  <br>
                                  <div class="table-responsive p-0 ">
                                    <table id="dttable_proveedores" class="table table-striped table-bordered w-100 ">
                                      <thead class="amber lighten-3">
                                        <tr>
                                          <td class="th-sm">Nombre</td>
                                          <td class="th-sm">Descripcion</td>
                                          <td class="th-sm">stok</td>
                                          <td class="th-sm">agregar</td>
                                        </tr>

                                      </thead>

                                      <tbody>

                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>

                                          <td>
                                            <button type="button" class="btn btn-info p-1" data-toggle="modal" data-target="#basicExampleModal2" onclick="llenar_prov('<?php echo $datos_prov  ?>')">
                                              <i class="fas fa-cart-plus"></i>
                                            </button>
                                          </td>
                                        </tr>

                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <!--.col-md-4-->
                            <div class="card">
                              <!--card-->
                              <div class="container">
                                <!--conten=edor-->
                                <div class="row">
                                  <div class="col-md-6">
                                    <label for=""><i class="fas fa-user-alt fa-1x"></i>Tipo de Usuario</label>
                                  </div>
                                  <div class="col-md-6">
                                    <form>
                                      <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switch1">
                                        <label class="custom-control-label" for="switch1">Estado</label>
                                      </div>
                                    </form>
                                  </div>
                                </div>

                                <label for=""><i class="fas fa-list-ol"></i>numero de boleta</label>
                                <div class="container">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <!--.col-md-8-->
                                      <select class="mdb-select form-control mt-1" id="s_u" name="tipodoc_p">
                                        <option value="" selected disabled>Seleccione cliente</option>
                                        <option value="DNI">cliente 1</option>
                                        <option value="CEDULA">cliente 2</option>
                                        <option value="RUC">cliente 3</option>

                                      </select>
                                    </div>
                                    <div class="col-md-6">
                                      <!--.col-md-4-->
                                      <button type="button" class="btn btn-info p-1" data-toggle="modal" data-target="#basicExampleModal2" onclick="llenar_prov('<?php echo $datos_prov  ?>')">
                                        Agregar <i class="fas fa-user-plus"></i>
                                      </button>
                                    </div>
                                    <div class="table-responsive p-0 ">
                                      <table id="dttable_proveedores" class="table table-striped table-bordered w-100 ">
                                        <thead class="amber lighten-3">
                                          <tr>
                                            <td class="th-sm">Nombre</td>
                                            <td class="th-sm">Cantidad</td>
                                            <td class="th-sm">Precio</td>
                                            <td class="th-sm">eliminar01</td>
                                          </tr>

                                        </thead>

                                        <tbody>



                                        </tbody>
                                      </table>
                                      <div class="container">
                                        <div class="row">
                                          <div class="col-md-8">
                                            <!--.col-md-8-->
                                          </div>
                                          <div class="col-md-4">
                                            <!--.col-md-4-->
                                            <button type="button" class="btn btn-info p-1" data-toggle="modal" data-target="#basicExampleModal2" onclick="llenar_prov('<?php echo $datos_prov  ?>')">
                                              agregar
                                            </button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>


                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>


              <!-- The Modal -->
              <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Registro de venta</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                      <!--Modal body..-->
                      <div class="container-fluid p-0">
                        <div class="row">
                          <div class="col-md-6">
                            <!--.col-md-8-->
                            <div class="card">
                              <!--card-->
                              <div class="container-fluid">
                                <!--contenedor-->
                                <div class="container-fluid">
                                  <br>
                                  <div class="table-responsive p-0 ">
                                    <table id="dttable_proveedores" class="table table-striped table-bordered w-100 ">
                                      <thead class="amber lighten-3">
                                        <tr>
                                          <td class="th-sm">Nombre</td>
                                          <td class="th-sm">Cantidad</td>
                                          <td class="th-sm">Precio</td>
                                          <td class="th-sm">Descuento</td>
                                          <td class="th-sm">Agregar1</td>
                                        </tr>
                                      </thead>
                                      <form>
                                        <tbody>
                                          <?php
                                          include("php/procesos/conexion.php");
                                          $mostrar_ventas = "SELECT * FROM articulos";
                                          $result_ventas = mysqli_query($mysqli, $mostrar_ventas);
                                          $cont = 0;
                                          foreach ($result_ventas as $fila) {
                                            $id = $fila["id_art"];
                                          ?>
                                            <tr>
                                              <td><?php echo $nombre = $fila["nombre_art"];  ?></td>
                                              <td><input type="number" style="width : 70px;" id="<?php echo "c" . $cont; ?>" value="1"></td>
                                              <td><input type="number" style="width : 70px;" id="<?php echo "p" . $cont; ?>" value="1"></td>
                                              <td><input type="number" style="width : 70px;" id="<?php echo "d" . $cont; ?>" value="0"></td>
                                              <td>
                                                <button type="button" class="btn btn-info p-1" onclick="agregar_articulo('<?php echo $cont ?>','<?php echo $nombre ?>','<?php echo $id ?>')">
                                                  <i class="fas fa-cart-plus"></i>
                                                </button>
                                              </td>
                                            </tr>
                                          <?php $cont++;
                                          } ?>
                                        </tbody>
                                      </form>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <!--.col-md-4-->
                            <div class="card">
                              <!--card-->
                              <div class="container" id="boletaPDF">
                                <!--conten=edor-->
                                <div class="row">
                                  <div class="col-md-6">
                                    <label for=""><i class="fas fa-user-alt fa-1x"></i><?php echo $_SESSION["nom_usuario"]; ?></label>
                                  </div>
                                  <div class="col-md-6">

                                  </div>
                                </div>

                                <label for=""><i class="fas fa-list-ol"></i>Nro de Boleta: <span id="boleta"><?php
                                                                                                              $nro_boleta = "SELECT * FROM ventas";
                                                                                                              $resp_nv = mysqli_query($mysqli, $nro_boleta);
                                                                                                              $filas_v = $resp_nv->num_rows;
                                                                                                              echo $filas_v + 1;
                                                                                                              ?></span></label>
                                <div class="container">



                                  <div class="row">
                                    <div class="col-md-6">

                                      <div class="container" id="select_cli">

                                      </div>

                                    </div>

                                    <div class="col-md-6">
                                      <!--.col-md-4-->
                                      <button type="button" class="btn btn-info p-1" data-toggle="modal" data-target="#modal_cli">
                                        Agregar <i class="fas fa-user-plus"></i>
                                      </button>

                                    </div>

                                    <!------------------------------------------------------------------------------>
                                    <div class="container" id="tabla_v">

                                    </div>
                                    <!--------------------------------------------------------------------------------->
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>

            </div>

            <!--sub modal -->
            <?php
            require("php/procesos/ventas/modal_cli.php");
            ?>

            <div class="tab-pane fade" id="pills-productos" role="tabpanel" aria-labelledby="pills-productos-tab">
              <div class="container my-4">
                <div class="card">
                  <div class="card-header" style="background: #ffe082;">
                    <h5>Productos</h5>
                  </div>
                  <div class="card-body">
                    <div class="w-100 my-2">
                      <button class="btn btn-primary btn-sm" data-toggle="modal" id="btnAdd">Registrar</button>
                    </div>
                    <div class="mt-4">
                      <div class="table-responsive p-2">
                        <table id="table-products" class="table table-hover table-bordered w-100">

                          <thead class="" style="background: #ffe082;">
                            <tr>
                              <th>Nombre</th>
                              <th>Stock</th>
                              <th>Detalle</th>
                              <th>Categoria</th>
                              <th>Vencimiento</th>
                              <th>Editar</th>
                            </tr>
                          </thead>

                          <tbody>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- INICIO DE INVENTARIO-->
            <div class="tab-pane fade" id="pills-inventario" role="tabpanel" aria-labelledby="pills-inventario-tab">

              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <div class="container">
                     <div class="card">
                      
                      <h5 class="card-header info-color amber lighten-3 text-center py-4">
                        <strong>Registro de Inventario</strong>
                      </h5>

                      <div class="card-body px-lg-5 pt-0">
                        <form class="text-center" id="form_agrega_inventario_p" >
                          <div class="mt-3" style="text-align: left;">
                            <label>Nombre Producto</label>
                            <input type="text" name="" id="nombre_inven" required class="form-control " placeholder="Nombre Producto">
                            <div class="text-danger text-center" id="inven_alert_1" style="display: none;">ingrese campos validos</div>
                          </div>
                          <div class="mt-3" style="text-align: left;">
                            <label>Precio</label>
                            <input type="number" name="" id="precio_inven" required class="form-control " placeholder="Precio">
                            <div class="text-danger text-center" id="inven_alert_2" style="display: none;">ingrese campos validos</div>                            
                          </div>
                          <div class="mt-3" style="text-align: left;">
                            <label>Fecha</label>
                            <input type="date" name="" id="fecha_inven" required class="form-control " >
                            <div class="text-danger text-center" id="inven_alert_3" style="display: none;">ingrese campos validos</div>
                            <div class=""> <p class="text-danger text-center" id="inven_alert_3"></p></div>
                          </div>
                          <div class="mt-3" style="text-align: left;">
                            <label>Cantidad</label>
                            <input type="number" name="" id="cantidad_inven" required class="form-control " placeholder="cantidad">
                            <div class="text-danger text-center" id="inven_alert_4" style="display: none;">ingrese campos validos</div>                            
                          </div>
                          <div class="mt-3" style="text-align: left;">
                            <label>Estado 1</label>
                            <select class="mdb-select form-control  mt-3" name="estado1_inven" id="estado1_inven" onchange="ver_primero()" required>
                              <option value=" ">Elige un estado</option>
                              <option value="Bien">Bien</option>
                              <option value="Mal">Mal</option>
                              <option value="Pesimo">Pesimo</option>
                            </select>
                            <div class="text-danger text-center" id="inven_alert_5" style="display: none;">ingrese campos validos</div>
                          </div>
                          <div class="mt-3" style="text-align: left;">
                            <label>Estado 2</label>
                            <select class="mdb-select form-control  mt-3" name="" id="estado2_inven" required>
                              <option value=" ">Elige un estado</option>
                              <option value="Activo">Activo</option>
                              <option value="Inactivo">Inactivo</option>
                            </select>
                            <div class="text-danger text-center" id="inven_alert_6" style="display: none;">ingrese campos validos</div>
                          </div>                      
                          <hr>
                          <button type="button" class="btn-primary my-3 btn-sm form-control"  onclick="agregar_inventario_p()">Agregar</button>
                        </form>                        
                      </div>

                    </div>
                    <!--contenedor 1-->
                  </div>
                </div>
               
                <div class="col-md-8" id="llega_tabla_inventario"></div>
              </div>
            </div>


            </div>
            <!-- FIN DE INVENTARIO-->
            <div class="tab-pane fade" id="pills-proveedores" role="tabpanel" aria-labelledby="pills-proveedores-tab">
              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <!--.col-md-4-->
                    <div class="container">
                      <div class="card">
                        <!--esta es un card-->
                        <h5 class="card-header info-color amber lighten-3 text-center py-4">
                          <strong>Registro de Proveedor</strong>
                        </h5>
                        <div class="card-body px-lg-5 pt-0">
                          <form class="text-center" id="form_agrega_prov">

                            <!-- Nombre Proveedor -->
                            <div class="mt-3">
                              <input type="text" name="nombre_p" id="nom_pro" required class="form-control " placeholder="Nombre Proveedor">
                              <div class="">
                                <p class="text-danger text-center" id="alert01"></p>
                              </div>

                            </div>

                            <!-- Direccion Proveedor -->
                            <div class="mt-3">
                              <input type="text" name="direccion_p" id="dir_pro" required class="form-control " placeholder="Direccion Proveedor">
                              <div class="">
                                <p class="text-danger text-center" id="alert02"></p>
                              </div>
                            </div>
                            <!-- Numero de Telefono -->
                            <div class="mt-3">
                              <input type="number" name="numero_p" id="num_pro" required class="form-control " placeholder="Numero de Telefono">
                              <div class="">
                                <p class="text-danger text-center" id="alert03"></p>
                              </div>
                            </div>

                            <!-- Tipo de Documento -->
                            <select class="mdb-select form-control  mt-3" id="s_u" name="tipodoc_p">
                              <option value="" selected disabled>tipo documento</option>
                              <option value="DNI">DNI</option>
                              <option value="CEDULA">CEDULA</option>
                              <option value="RUC">RUC</option>

                            </select>
                            <!-- Numero de documento -->
                            <div class="mt-3">
                              <input type="number" name="numero_d" id="numd_pro" class="form-control" required placeholder="Numero de documento">
                              <div class="">
                                <p class="text-danger text-center" id="alert04"></p>
                              </div>
                            </div>
                            <!-- Send button -->
                            <hr>
                            <button type="button" class="btn-primary my-3 btn-sm form-control" onclick="agregar_proveedor()">Agregar</button>

                          </form>
                          <!-- Form -->
                        </div>
                      </div>
                      <!--contenedor 1-->
                    </div>
                  </div>

                  <div class="col-md-8" id="llega_tabla_proveedor">
                    <!--.col-md-8-->

                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="pills-usuarios" role="tabpanel" aria-labelledby="pills-usuarios-tab">
              <div class="container-fluid">
                <div class="row pt-2">
                  <div class="col-md-5  pt-2">
                    <div class="modal-header amber lighten-3 dark-text  mb-1 pt-3">
                      <h4 class="title text-center w-100">
                        Agregar usuarios</h4>

                    </div>
                    <form id="form_agrega_usuario" class="jumbotron">


                      <div class="row">

                        <div class="col-md-6 mb-3">
                          <input type="text" class="form-control validar_usuario_ag" placeholder="usuario" name="id_usu_ag" id="usu_u">
                          <div class="">
                            <p class="text-danger text-center" id="alert_u01"></p>
                          </div>
                        </div>

                        <div class="col-md-6 mb-3">
                          <input type="text" class="form-control validar_usuario_ag" placeholder="direccion" name="dir_usu_ag" id="dir_u">
                          <div class="">
                            <p class="text-danger text-center" id="alert_u02"></p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">

                          <input class=" form-control validar_usuario_ag" name="telf_usu_ag" id="num_u" placeholder="ingrese numero" type="number" maxlength="9" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                          <div class="">
                            <p class="text-danger text-center" id="alert_u03"></p>
                          </div>

                        </div>
                        <div class="col-md-6 mb-3">
                          <select type="text" class="form-control validar_usuario_ag" id="s_u2" name="tipo_usu_ag">
                            <option value="" selected disabled>tipo usuario</option>
                            <option value="Dueño">Dueño</option>
                            <option value="administrador">Administrador</option>
                            <option value="Vendedor">Vendedor</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <input type="text" class="form-control validar_usuario_ag" placeholder="nombre" id="nom_u" name="nom_usu_ag">
                          <div class="">
                            <p class="text-danger text-center" id="alert_u04"></p>
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <input type="text" class="form-control validar_usuario_ag" placeholder="contraseña" id="con_u" name="contra_usu_ag">
                          <div class="">
                            <p class="text-danger text-center" id="alert_u05"></p>
                          </div>
                        </div>
                      </div>

                      <hr>
                      <div class="row">
                        <div class="col-sm"></div>
                        <div class="col-sm">

                          <button type="button" class="btn btn-primary btn-sm" onclick="agregar_usuario()">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> AGREGAR </button>
                        </div>

                      </div>

                    </form>
                  </div>
                  <div class="col-md-7 py-0" id="llega_tabla_usuario">

                  </div>
                </div>

              </div>
            </div>

            <div class="tab-pane fade" id="pills-promociones" role="tabpanel" aria-labelledby="pills-promociones-tab">Est
              quis nulla laborum officia ad nisi reprehenderit laborum veniam eu veniam. Eiusmod minim
              exercitation fugiat irure ex labore incididunt do fugiat commodo aliquip sit id deserunt reprehenderit
            </div>
            <div class="tab-pane fade" id="pills-clientes" role="tabpanel" aria-labelledby="pills-clientes-tab">

              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <!--.col-md-4-->
                    <div class="container">
                      <div class="card">
                        <!--esta es un card-->
                        <h5 class="card-header info-color amber lighten-3 text-center py-4">
                          <strong>Registro de cliente</strong>
                        </h5>
                        <div class="card-body px-lg-5 pt-0">
                          <form class="text-center" id="form_agrega_cliente_p">

                            <!-- Nombre cliente -->
                            <div class="mt-3">
                              <input type="text" name="nombre_c" id="nom_cli_p" required class="form-control " placeholder="Nombre cliente">
                              <div class="">
                                <p class="text-danger text-center" id="alert01_p"></p>
                              </div>

                            </div>

                            <!-- Direccion cliente -->
                            <div class="mt-3">
                              <input type="text" name="direccion_c" id="dir_cli_p" required class="form-control " placeholder="Direccion cliente">
                              <div class="">
                                <p class="text-danger text-center" id="alert02_p"></p>
                              </div>
                            </div>
                            <!-- Numero de Telefono -->
                            <div class="mt-3">
                              <input type="number" name="tel_c" id="tel_cli_p" required class="form-control " placeholder="Numero de Telefono">
                              <div class="">
                                <p class="text-danger text-center" id="alert03_p"></p>
                              </div>
                            </div>

                            <!-- Tipo de Documento -->
                            <select class="mdb-select form-control  mt-3" id="s_c_p" name="tipodoc_c">
                              <option value="" selected disabled>tipo documento</option>
                              <option value="DNI">DNI</option>
                              <option value="RUC">RUC</option>

                            </select>
                            <!-- Numero de documento -->
                            <div class="mt-3">
                              <input type="number" name="numero_c" id="numd_cli_p" class="form-control" required placeholder="Numero de documento">
                              <div class="">
                                <p class="text-danger text-center" id="alert04_p"></p>
                              </div>
                            </div>
                            <!-- Send button -->
                            <hr>
                            <button type="button" class="btn-primary my-3 btn-sm form-control" onclick="agregar_cliente_p()">Agregar</button>

                          </form>
                          <!-- Form -->
                        </div>
                      </div>
                      <!--contenedor 1-->
                    </div>
                  </div>

                  <div class="col-md-8" id="llega_tabla_cliente">
                    <!--.col-md-8-->

                  </div>
                </div>
              </div>
              <!------------------------------------------------------------------------------------------------------>

            </div>
          </div>
        </div>
        <div class="col-sm-1 p-0"></div>
      </div>

    </div>
    <!----------------------------------modal de producto ----------------->
    <div class="modal fade" id="modal-add-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header" style="background: palegreen;">
            <h5 class="modal-title" id="modal-title">Registrar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form-add-product">
              <input type="text" class="form-control" id="id" name="id" placeholder="" hidden>
              <div class="row">
                <div class="col-6 form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="">
                </div>
                <div class="col-6 form-group">
                  <label>Cantidad</label>
                  <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="">
                </div>
                <div class="col-6 form-group">
                  <label>Categoria</label>
                  <select class="form-control" id="categoria" name="categoria">
                  </select>
                </div>
                <div class="col-6 form-group">
                  <label>Precio</label>
                  <input type="munber" class="form-control" id="precio" name="precio" placeholder="">
                </div>
                <div class="col-6 form-group">
                  <label>Proveedor</label>
                  <select class="form-control" id="proveedor" name="proveedor">
                  </select>
                </div>
                <div class="col-6 form-group">
                  <label>Estado</label>

                  <select class="form-control" id="estado" name="estado">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                  </select>

                </div>

                <div class="col-6 form-group">
                  <label>Vencimiento</label>
                  <input type="date" class="form-control" id="vencimiento" name="vencimiento" placeholder="">
                </div>
                <div class="col-6 form-group">
                  <label>Descripción</label>
                  <textarea name="descripcion" id="descripcion" cols="30" rows="2" class="form-control"></textarea>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary btn-sm " id="btnSave">Agregar</button>
          </div>
        </div>
      </div>
    </div>
    <!------------------------------------------------------------------------------->


    <!-- modales -->

    <div class="row" id="modales"></div>

    <?php
    require("vistas/componentes/footer.html");
    ?>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#dttable_proveedores').DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
          }
        });

      });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#dttable_ventas').DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
          }
        });

      });
    </script>
    <script>
    $(document).ready(function () {
      ver_reporte_dia();
      ver_reporte_sem();
    });
    </script>
   


  </body>

  </html>

<?php
} else {
  // echo "no eres bienbenido shu";
  header("Location: index.php");
}
?>