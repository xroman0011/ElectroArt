<?php
include ('include/connect.php');
if(isset($_POST['Save'])){
$idArt = mysqli_real_escape_string($con, $_POST['idArt']);
$NombreArt = mysqli_real_escape_string($con, $_POST['NombreArt']);
$DescripcionArt = mysqli_real_escape_string($con, $_POST['DescripcionArt']);
    $filename = $_FILES["ImageArt"]["name"];
    $tempname = $_FILES["ImageArt"]["tmp_name"];
    $folder = "./image/" . $filename;   
$idCat = mysqli_real_escape_string($con, $_POST['idCat']);
$Precio = mysqli_real_escape_string($con, $_POST['Precio']);

}
$sql = "INSERT INTO articulos (idArt, NombreArt, DescripcionArt, ImageArt, idCat, Precio)
VALUES ('$idArt', '$NombreArt', '$DescripcionArt', '$filename', '$idCat', '$Precio')";
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

h3 {
  text-align: center;
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
<h4>Articulo guardado</h4>
<?php
if (!mysqli_query($con,$sql)) {
  die(' Error: ' . mysqli_error($con));
}
else{
    echo "<h1> Registro guardado exitosamente</h1>";
}

if (move_uploaded_file($tempname, $folder)) {
  echo "<h3>  El imagen esta guardado!</h3>";
} else {
  echo "<h3>  No se guardo el imagen</h3>";
}
?>
</div>
</div>
</header>
<html>