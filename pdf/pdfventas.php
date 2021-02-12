
<?php
require("../php/procesos/conexion.php");
$id_dv=$_GET["id_venta"];


$select_clientes= "SELECT cliente.*, ventas.* FROM cliente INNER JOIN ventas on ventas.dni_c=cliente.DNI_cli WHERE ventas.id_venta={$_GET['id_venta']}";
$res = mysqli_query($mysqli,$select_clientes);
$respuesta = mysqli_fetch_row($res);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Botica Varela</title>
	<!-- MDB icon -->
	<link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="css/mdb.min.css">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="css/style.css">

	<link href="css/addons/datatables.min.css" rel="stylesheet">

	<style>
		.bold{
				font-weight: bold;
		}

		.magin{
			max-width: 800px;
			margin: auto;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		.table2{
			width: 500px;
			float: right;
		}

		.table td, .table th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}

		.margin-top{
			margin-top: 16px;
		}

		.margin-top-30 {
			margin-top: 30px;
		}
/*
tr:nth-child(even) {
  background-color: #dddddd;
  }*/
</style>
</head>
<body class="magin">

	<table class="margin-top-30">
		<tbody>
			<tr>
				<td>
					BOTICA BARELA
				</td>
				<td>
					NUMERO DE TELEFONO: <span class="bold"></span>
				</td>
				<td>
					NRO BOLETA: <span class="bold"><?php echo $_GET['id_venta']; ?></span>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					DIRECCION: <span class="bold"></span>
				</td>
			</tr>
		</tbody>
	</table>

	<table class="margin-top table">
		<tbody>
			<tr>
				<td>
					NOMBRE CLIENTE: <span class="bold"><?php echo $respuesta[1]; ?></span>
				</td>
				<td>
					FECHA: <span class="bold"><?php echo $_GET["fecha"]; ?></span>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					NOMBRE VENDEDOR: <span class="bold"><?php echo $_GET["usuario"];?></span>
				</td>
			</tr>
		</tbody>
	</table>

	<table class="margin-top table">
		<thead>
			<tr>
				<td>
					NOMBRE
				</td>
				<td>
					CANTIDAD
				</td>
				<td>
					PRECIO UNITARIO
				</td>
			</tr>
		</thead>
		<tbody >
			<?php


				$sql = "SELECT * from det_venta INNER JOIN ventas on det_venta.id_v01=ventas.id_venta
				INNER JOIN articulos on det_venta.id_art01=articulos.id_art
				INNER JOIN cliente on ventas.dni_c=cliente.DNI_cli
				WHERE det_venta.id_v01=".$id_dv;
				$result = mysqli_query($mysqli, $sql);
				foreach ($result as $mostrar) {
			?>

			<tr>
                <td>
                  <span class="bold"><?php echo $mostrar['nombre_art']?> <!---nombre del producto---></span>
                </td>

                <td>
                  <span class="bold"><?php echo $mostrar['cantidad_dv']?></span>

                </td>
                <td>
                  <span class="bold"><?php echo $mostrar['precio_dv']?></span>

                </td>
              </tr>

		<?php } ?>
		</tbody>
		</table>

			<table class="margin-top table table2">
				<tbody>
					<tr>
						<td>
							NETO: <span class="bold"><?php echo $respuesta[10]; ?></span>
						</td>
						<td>
							PARCIAL: <span class="bold"><?php echo $respuesta[8]; ?></span>
						</td>
					</tr>
					<tr >
						<td>
							DESCUENTO: <span class="bold"><?php echo $respuesta[9]; ?></span>
						</td>
						<td>
							TOTAL:  <span class="bold"><?php echo $respuesta[11]; ?></span>
						</td>
					</tr>
				</tbody>
			</table>

		</body>

		<!-- jQuery -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<!-- MDBootstrap Datatables  -->
		<script type="text/javascript" src="js/addons/datatables.min.js"></script>
		<!-- Bootstrap tooltips -->
		<script type="text/javascript" src="js/funciones.js"> </script>
		<!-- Bootstrap core JavaScript -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!-- MDB core JavaScript -->
		<scrip type="text/javascript" src="js/mdb.min.js"></scrip>
		<!-- sweet alert para mejorar las alertas -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

		<!-- html2pdf -->
		<script src="js/html2pdf.bundle.min.js"></script>

		</html>
