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
    width: 200px;
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
<?php
// adquirir Variables del URL:
$idventa = $_GET["Getid"];

$query = "SELECT v.idVenta, v.FechaCompra, v.idArt, v.idCliente, v.Cantidad,
p.SubTotal, p.Impuesto, p.Total,
a.NombreArt, a.ImageArt, a.precio,
c.Nombre, c.Apellidos

FROM venta v
INNER JOIN procventa p ON p.idVenta = v.idVenta
INNER JOIN articulos a ON a.idArt = v.idArt
INNER JOIN cliente c ON c.idCliente = v.idCliente
WHERE v.idVenta = $idventa";

$result = mysqli_query($con,$query);
while($row = $result->fetch_assoc())
{
    $fecha = $row['FechaCompra'];
    $idart = $row['idArt'];
    $nombreart = $row['NombreArt'];
    $imagen = $row['ImageArt'];
    $cantidad = $row['Cantidad'];
    $subtotal = $row['SubTotal'];
    $impuesto = $row['Impuesto'];
    $total = $row['Total'];
    $idcliente = $row['idCliente'];
    $nombrecl = $row['Nombre'];
    $apellidoscl = $row['Apellidos'];
}
?>
<div class="container">
<div class="row">
<h2>Detalle de la Venta # <?php echo $idventa; ?></h2>
</div>
</div>
<div class="container">

<div class="form-group">  
  <label class="col-sm-2">Cliente:</label> <output class="form-control"><?php echo " ($idcliente)&nbsp;$nombrecl&nbsp;$apellidoscl";?></output>             
</div>
<div class="form-group">  
  <label class="col-sm-2">FechaCompra: </label> <output class="form-control"><?php echo $fecha;?></output>          
</div>
<div class="form-group">  
  <label class="col-sm-2">Artículo: </label> <output class="form-control"><?php echo "($idart)&nbsp;$nombreart";?></output>             
</div>
<div class="container">
<div class="row">
<img src="./image/<?php echo $imagen;?>" class="rounded" id="thumb">
</div>
</div>
<div class="form-group">  
  <label class="col-sm-2">Cantidad: </label> <output class="form-control"><?php echo $cantidad;?></output>          
</div>
<div class="form-group">  
  <label class="col-sm-2">SubTotal: </label> <output class="form-control"><?php echo $subtotal;?></output>          
</div>
<div class="form-group">  
  <label class="col-sm-2">Impuesto: </label> <output class="form-control"><?php echo $impuesto;?></output>          
</div>
<div class="form-group">  
  <label class="col-sm-2">Total: </label> <output class="form-control"><?php echo $total;?></output>            
</div>
</div>
<a href = "index.php" class="btn btn-primary">Regresar</a>
</div>
</div>
</body>
</html>
