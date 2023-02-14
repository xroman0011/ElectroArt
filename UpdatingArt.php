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
?>
<!DOCTYPE html>
<html>
<head>
<title>Electronic Art</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
<h4>Update Record</h4>
</div>
</div>
</header>
<?php
$sql = "UPDATE articulos SET NombreArt='$NombreArt', DescripcionArt='$DescripcionArt', ImageArt='$filename', idCat='$idCat', Precio='$Precio' WHERE idArt = $idArt";

if (!mysqli_query($con,$sql)) {
    die(' Error: ' . mysqli_error($con));
  }
  else{
      echo "<h3> Registro guardado exitosamente</h3>";
  }

if (move_uploaded_file($tempname, $folder)) {
    echo "<h3>  El imagen esta guardado!</h3>";
  } else {
    echo "<h3>  No se guardo el imagen</h3>";
  }
?>