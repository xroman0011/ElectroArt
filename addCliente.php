<?php
include ('include/connect.php');
$query1 = "Select * From cliente";
$resultset = mysqli_query($con,$query1);
?>
<!DOCTYPE html>
<html lang="es">
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<?php include('include/menu.php');?>
</nav>
<header>
<div class="container">
<h1>Electronic Art</h1>
<div class="container">
<h4>Entrar Nuevo Cliente</h4>
</div>
</div>
</header>
<div class="col-sm-8">
      <form name="edit" method="Post" action="addingCliente.php" class="row g-3 needs-validation" novalidate>
           <input type="hidden" name="idCliente" class="form-control" value=""/>
               <div class="form-group">
                   <label for="validationCustom01" class="col-sm-2">Nombre:</label>
                   <input type="text" name="Nombre" class="from-control" value="" id="validationCustom01"/>
                   <div class="valid-feedback">Value is valid!</div>
                   <div class="invalid-feedback">Value is invalid! Please enter a name</div>
               </div>
               <div class="form-group">
                   <label for="validationCustom02" class="col-sm-2">Apellidos:</label>
                   <input type="text" name="Apellidos" class="from-control" value="" id="validationCustom02"/>
                   <div class="valid-feedback">Value is valid!</div>
                   <div class="invalid-feedback">Value is invalid! Please enter a name</div>
               </div>
               <div class="form-group">
                   <label for="validationCustom03" class="col-sm-2">Tel:</label>
                   <input type="text" name="Tel" class="from-control" value="" id="validationCustom03"/>
                   <div class="valid-feedback">Value is valid!</div>
                   <div class="invalid-feedback">Value is invalid! Please enter a name</div>
               </div>
               <div class="form-group">
                   <label for="validationCustom04" class="col-sm-2">Email:</label>
                   <input type="text" name="Email" class="from-control" value="" id="validationCustom04"/>
                   <div class="valid-feedback">Value is valid!</div>
                   <div class="invalid-feedback">Value is invalid! Please enter a name</div>
               </div>
               <div>
                     <button type="submit" name="Save" value="Continuar" class="btn btn-success">Enviar</button>
                     <button type="button" name="Return" onclick="history.back()" class="btn btn-primary">Regresar</button>
               </div>
      </form>
</div>

</html>