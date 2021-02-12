<form id="form_s_cli">
<select class="mdb-select form-control mt-1" id="sel_cli" name="sel_cli">
                              <option disabled selected>Seleccione cliente</option>
                              <?php  
                              	require("../conexion.php");
                                $select_clientes= "SELECT * FROM cliente";
                                $respuesta = mysqli_query($mysqli,$select_clientes);
                                foreach ($respuesta as $row) {?>
                                  <option  value="<?php echo $row['DNI_cli']?>" ><?php echo $row["nombre_cli"] ?></option>
                                <?php }
                                 ?>
</select>
</form>