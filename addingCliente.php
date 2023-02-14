<?php
require "include/connect.php";

$idCliente = mysqli_real_escape_string($con, $_POST['idCliente']);
$Nombre = mysqli_real_escape_string($con, $_POST['Nombre']);
$Apellidos = mysqli_real_escape_string($con, $_POST['Apellidos']);
$Tel = mysqli_real_escape_string($con, $_POST['Tel']);
$Email = mysqli_real_escape_string($con, $_POST['Email']);

$sql = "INSERT INTO cliente (idCliente, Nombre, Apellidos, Tel, Email)
VALUES ('$idCliente', '$Nombre', '$Apellidos', '$Tel', '$Email')";
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
<?php include('include/menu.php');?>
</nav>
<header>
<div class="container">
<div class="row">
<h1>Electronic Art</h1>
<div class="container">
<div class="row">
</div>
</div>
</header>
<?php
if ($con -> query($sql) == TRUE) {
    echo "<h2>New record created successfully</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
?>
</html>