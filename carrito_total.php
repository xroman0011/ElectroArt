<?php
include ('include/connect.php');
?>
<?php
//Variables
$fecha = $_GET['FechaCompra'];
$idcliente = $_GET['idCliente'];
$idart = $_GET['idArt'];
$cantidad = $_GET['Cantidad'];
//SQL
$sql = "INSERT INTO venta (FechaCompra, idArt, idCliente, Cantidad)
VALUES ('$fecha', '$idart', '$idcliente', '$cantidad')";

//Busca el id del útimo record entrado.
if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);
    echo "New record created successfully. Last inserted ID is: " .$last_id;
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
//Busca todo los campos en la tabla articulos donde el id es igual al articulo seleccionado en la compra.
$sql2 = "SELECT * From articulos WHERE idArt = '".$idart."';";
$result = mysqli_query($con,$sql2);
While($row = mysqli_fetch_assoc($result))
{ 
$id_art = $row['idArt'];
$nombreart = $row['NombreArt'];
$descr = $row['DescripcionArt'];
$imagen = $row['ImageArt'];
$precio = $row['Precio'];
}
$sql3 = "SELECT * From cliente WHERE idCliente = '".$idcliente."';";
$result = mysqli_query($con,$sql3);
While($row = mysqli_fetch_assoc($result))
{ 
$nombre = $row['Nombre'];
$apellidos = $row['Apellidos'];

}
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
<h2>Carrito de Compra del cliente: <?php echo "$nombre&nbsp;$apellidos";?></h2>
</div>
</div>
<div class="container">
<div class="row">
<h2>Producto</h2>
<div class="container">
<div class="row">
<h4><?php echo $nombreart;?></h4>
</div>
</div>
<div class="container">
<div class="row">
<img src="./image/<?php echo $imagen;?>" class="rounded" Style="width:400px; height:auto;">
</div>
</div>
</div>
</div>
<form name="ventatotal" method="POST" action="ventatotal.php?Getid=<?php echo $last_id;?>" class="form-horizontal">
<input type="hidden" name="idVenta" value="<?php echo $last_id;?>">
<div class="form-group">  
  <label class="col-sm-2">Precio:</label><span class="input-group-text">$</span><output class="form-control" style="width:200px;"><?php echo $precio;?></output> 			
</div>
<div class="form-group">  
  <label class="col-sm-2">Cantidad: </label> <output class="form-control"><?php echo $cantidad;?></output> 			
</div>
<div class="form-group">  
  <label class="col-sm-2">SubTotal: </label><span class="input-group-text">$</span><input type="text" name="SubTotal" class="form-control Currency" style="width:200px;" value="<?php $subtotal = $precio * $cantidad; $subtotal = number_format($subtotal, 2, '.', '');echo $subtotal ;?>" readonly> 			
</div>
<div class="form-group">  
  <label class="col-sm-2">Impuesto (IVU): </label><span class="input-group-text">$</span><input type="text" name="Impuesto" class="form-control Currency" style="width:200px;" value="<?php $impuesto = $subtotal * .115;$impuesto = number_format($impuesto, 2, '.', ''); echo $impuesto;?>" readonly> 			
</div>
<div class="form-group">  
  <label class="col-sm-2">Total: </label><span class="input-group-text">$</span><input type="text" name="Total" class="form-control Currency" style="width:200px;" value="<?php $total = $subtotal + $impuesto; $total = number_format($total, 2, '.', ''); echo $total;?>" readonly> 			
</div>
<div class="form-group">
  <input type="submit" name="submit" class="btn btn-success" value="Comprar"> 
  <a href="eliminar.php?Getid=<?php echo $last_id;?>" onclick="myFunction()" class="delete btn btn-primary">Cancelar</a>

</div> 
</form>
<?php
$con->close();
?>
</div>
</div>
</body>
</html>

<script>
  //función par preguntar si continuó con la cancelación de a orden.
function myFunction() {
  var txt;
  var r = confirm("¿Desea Retirar la orden?");
  if (r == true) {
   
  } else {
    
  }
}
</script>
 