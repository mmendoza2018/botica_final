<?php 
$datos_deb=$_POST["id_v"];

?>
<form id="form_dev">
	

<input type="text" name = "id_dev" id="id_dev" hidden value="<?php echo $datos_deb?>">
<div class="custom-control custom-switch">
	<input type="checkbox" class="custom-control-input" id="customSwitch1" checked name="switch_dev">
	<label class="custom-control-label" for="customSwitch1">Estado</label>
</div>
<button type="button" class="btn btn-info btn-sm" id="" onclick="actualizar_bo()">Actualizar</button>
</form>
<?php  



?>
