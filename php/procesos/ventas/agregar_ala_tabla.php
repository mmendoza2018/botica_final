
<?php
        session_start();
        ?>

<div class="table-responsive p-0 pt-5" >
    <table id="dttable_proveedores" class="table table-striped table-bordered w-100 ">
        <thead class="amber lighten-3">
            <tr>
              <td class="th-sm">Nombre</td>
              <td class="th-sm">Cantidad</td>
              <td class="th-sm">Precio</td>
              <td class="th-sm">Descuento</td>
              <td class="th-sm">Eliminar</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $total=0;
            $cont=0;
            $neto=0;
            $suma_desc=0;
            $total_general=0;
              if(isset($_SESSION['datos'])){
                $data = $_SESSION['datos'];
              foreach ($_SESSION['datos'] as $row) {

                $a=explode("|", $row);
                $total=$a[1]*$a[0];
                  $neto+=$total;
                  $suma_desc+=$a[2];
                ?>
                <tr>
                    <td><?php echo $a[3] ?></td>
                    <td><?php echo $a[0] ?></td>
                    <td><?php echo $a[1] ?></td>
                    <td><?php echo $a[2] ?></td>
                    <td>
                        <button type="button" class="btn btn-info p-1" onclick="elimina_art('<?php echo $cont ?>')">
                        <i class="fas fa-trash-alt"></i>
                    </td>
                </tr>
            <?php
                $cont++;}  }
                else{
                    echo " ";
                }
                ?>
            <tr>
            <td colspan="3"></td>
            <td>neto:</td>
            <td><?php echo $neto ?></td>
            </tr>
            <tr>
            <td colspan="3"></td>
            <td>Parcial:</td>
            <td><?php echo $parcial=($neto-$suma_desc);
            $igv=$parcial*(0.18);
            ?></td>
            </tr>
            <tr>
            <td colspan="3"></td>
            <td>total:</td>
            <td><?php echo $total_general=$parcial+ $igv;
            $datos_venta=$neto."|".$parcial."|".$total_general."|".$suma_desc;
            $_SESSION["datos_venta"]=$datos_venta;

            ?></td>
            </tr>
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            <div class="col-md-8"><!--.col-md-8--></div>
                <div class="col-md-4"><!--.col-md-4-->
                    <button type="button" class="btn btn-info p-1" onclick="agregar_venta()">
                        IMPRIMIR VENTA
                    </button>
                </div>
        </div>
    </div>
</div>
