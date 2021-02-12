<?php
require_once("../conexion.php");
$clientes = "SELECT * FROM cliente WHERE estado_cli=1";
$res_clientes = mysqli_query($mysqli, $clientes);
$filas_cli = $res_clientes->num_rows;

$articulos = "SELECT * FROM articulos WHERE estado_art=1";
$res_articulos = mysqli_query($mysqli, $articulos);
$filas_art = $res_articulos->num_rows;
session_start();
?>
<div class="row h-100 my-5">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-5">
                <!-- Card Dark -->
                <div class="card">
                    <!-- Card image -->

                    <!-- Card content -->
                    <div class="card-body bg-info white-text rounded-bottom ">

                        <!-- Title -->
                        <h4 class="card-title">Ventas diarias</h4>
                        <hr class="hr-light">
                        <div class="row">
                            <div class="col-6 ">
                                <h2 class="text-center"><?php echo $_SESSION["r_diario"]; ?></h2>
                                <h5 class="text-center">soles</h5>
                            </div>
                            <div class="col-6 pt-5"> <a onclick="ver_reporte_dia()" class="white-text d-flex justify-content-end" data-toggle="modal" data-target="#modal_vt_dia">
                                    <h5>Ver mas <i class="fas fa-angle-double-right"></i></h5>
                                </a></div>
                        </div>

                        <!-- Link -->
                    </div>

                </div>
                <!-- Card Dark -->
                <!-- Card Dark -->
                <div class="card mt-4">
                    <!-- Card image -->
                    <!-- Card content -->
                    <div class="card-body bg-success white-text rounded-bottom ">

                        <!-- Title -->
                        <h4 class="card-title">Ventas semanales</h4>
                        <hr class="hr-light">
                        <div class="row">
                            <div class="col-6 ">
                                <h2 class="text-center"><?php echo $_SESSION["r_semana"] ?></h2>
                                <h5 class="text-center">Soles</h5>
                            </div>
                            <div class="col-6 pt-5">
                                <a onclick="ver_reporte_sem()" class="white-text d-flex justify-content-end" data-toggle="modal" data-target="#modal_vt_sem">
                                    <h5>Ver mas <i class="fas fa-angle-double-right"></i></h5>
                                </a>
                            </div>
                        </div>

                        <!-- Link -->
                    </div>

                </div>
                <!-- Card Dark -->
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-5">
                <!-- Card Dark -->
                <div class="card">
                    <!-- Card image -->

                    <!-- Card content -->
                    <div class="card-body bg-warning white-text rounded-bottom ">

                        <!-- Title -->
                        <h4 class="card-title">Clientes</h4>
                        <hr class="hr-light">
                        <div class="row">
                            <div class="col-6 ">
                                <h2 class="text-center"><?php echo $filas_cli; ?></h2>
                                <h5 class="text-center">registrados</h5>
                            </div>
                            <div class="col-6 pt-2 pl-5">
                                <i class="fas fa-user-check fa-3x"></i>
                            </div>
                        </div>

                        <!-- Link -->
                    </div>

                </div>
                <!-- Card Dark -->
                <!-- Card Dark -->
                <div class="card mt-4">
                    <!-- Card image -->
                    <!-- Card content -->
                    <div class="card-body bg-secondary white-text rounded-bottom ">

                        <!-- Title -->
                        <h4 class="card-title">Articulos</h4>
                        <hr class="hr-light">
                        <div class="row">
                            <div class="col-6 ">
                                <h2 class="text-center"><?php echo $filas_art ?></h2>
                                <h5 class="text-center">registrados</h5>
                            </div>
                            <div class="col-6 pt-2 pl-5">
                                <i class="fas fa-box-open fa-3x"></i>
                            </div>
                        </div>

                        <!-- Link -->
                    </div>

                </div>
                <!-- Card Dark -->
            </div>
        </div>
    </div>

    <div class="col-sm-"></div>
</div>