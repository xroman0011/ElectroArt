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
<?php
$query1 = "SELECT * From cliente;";
$resultset1 = mysqli_query($con,$query1);

?>
<?php
$query2 = "SELECT * From articulos;";
$resultset2 = mysqli_query($con,$query2);
?>

</head>
<body>
<nav>
<?php include('include/menu.php');?>
</nav>
<div class="container">
<div class="row">
<h1>Electronic Art</h1>
<div class="container">
<div class="row">
<h4>Crear una Venta</h4>
</div>
</div>
<div class="container">
<div class="row">
<form method="get" action="carrito_total.php" class="form-horizontal" >
<div class="form-group">  
  <label class="col-sm-2">Cliente:</label> 
		<select name = "idCliente" class="form-control">
		    <option  value = "" SELECTED>Seleccionar Cliente</option>
				<?php 
					while($row = $resultset1 -> fetch_assoc())
						{
							$id_cl = $row['idCliente'];
                            $name_cliente = $row['Nombre'];
                            $apellido_cliente = $row['Apellidos'];
							echo "<option value='$id_cl'>$id_cl.&nbsp;$name_cliente&nbsp;$apellido_cliente</option>";
						}
				?>
		</select>
</div>
<div class="form-group">  
  <label class="col-sm-2">Artículo:</label> 
		<select name = "idArt" class="form-control">
		    <option  value = "" SELECTED>Seleccionar Artículo</option>
				<?php 
					while($row = $resultset2 -> fetch_assoc())
						{
							$id_art = $row['idArt'];
                            $name_art = $row['NombreArt'];
                            $precio = $row['Precio'];
							echo "<option value='$id_art'>$id_art.&nbsp;$name_art&nbsp;Precio($ $precio)</option>";
						}
				?>
		</select>
</div>
</div>
<div class="form-group">
  <label class="col-sm-2">Fecha Venta:</label><input type="hidden" value="<?php echo date('Y-m-d');?>" name="FechaCompra" class="form-control" style="width:300px;">
</div>
<div class="form-group">  
  <label class="col-sm-2">Cantidad:</label><input type="number" name="Cantidad" class="form-control " step="1" style="width:80px;">
</div>

<div class="form-group">
  <input type="submit" name="submit" class="btn btn-success" value="Continuar"> 
  <input type="button" value="Regresar" onclick="history.back()" class="btn btn-primary">
</div> 
</form>


</div>
</div>
</body>
</html>