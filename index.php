<!DOCTYPE html>
<html lang="en">
<?php 
require("vistas/componentes/header.html");

?>
<body>
  
<div class="bg">
<div class="container-fluid">
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4 pt-5">
    <!-- Default form login -->
    <form action="/action_page.php" class="was-validated text-center border border-light p-5 form_fondo">
    <img src="img/logo.jpeg" class="img-fluid" alt="Responsive image">
<hr>
    
  <div class="form-group">
    <input type="text" class="form-control" id="usuario" placeholder="usuario" name="uname" required>
    <div class="valid-feedback"></div>
    <div class="invalid-feedback"></div>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="pass" placeholder="contraseña" name="pswd" required>
    <div class="valid-feedback"></div>
    <div class="invalid-feedback"></div>
  </div>
  
  <button type="button" class="btn btn-success form-control py-2" onclick="enviar()">Ingresar</button>
</form>
<!-- Default form login -->
  </div>
  <div class="col-sm-4"></div>
</div> 
</div>
</div>
<?php require("vistas/componentes/footer.html") ?>

  

</body>
</html>
