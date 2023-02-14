<?php
include ('include/connect.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Electronic Art</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<style>
#thumb{
    width: 100px;
    height: auto;
}
</style>
</head>
<body>
<nav>
<?php include('include/menu.php');
?>
</nav>
<div class="container">
<div class="row">
<h1>Electronic Art</h1>
<div class="container">
<div class="row">
<h2>Listado de Ventas</h2>
</div>
</div>
<?php
$query = "SELECT * From procventa;" ;

$result = mysqli_query($con,$query);

?>
<table class="table table-striped table-hover table-bordered">
<tr>
<th>ID Venta</th>
<th>SubTotal</th>
<th>Impuesto</th>
<th>Total</th>
</tr>
<?php 
while($row = mysqli_fetch_assoc($result))
{
// Buscar valores de los campos en la base de datos y guardarlos en variables.
$idventa = $row['idVenta'];
//$fecha = $row['FechaCompra'];
//$idart = $row['idArt'];
//$nombreart = $row['NombreArt'];
//$imagen = $row['ImageArt'];
//$cantidad = $row['Cantidad'];
$subtotal = $row['SubTotal'];
$impuesto = $row['Impuesto'];
$total = $row['Total'];
//$idcliente = $row['idCliente'];
//$nombrecl = $row['Nombre'];
//$apellidoscl = $row['Apellidos'];
?>
<tr>
<td><a href ="detalle-venta.php?Getid=<?php echo $idventa; ?>"><?php echo $idventa; ?></a></td>
<td><?php echo $subtotal; ?></td>
<td><?php echo $impuesto; ?></td>
<td><?php echo $total; ?></td>
</tr>
<?php
}
?>
<?php
mysqli_close($con);
?>
</table>
</div>
</div>
</body>
</html>
