<?php
include ('include/connect.php');
$query = "Select * From articulos";
$resultado = $con -> query($query);
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

h4{
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
<h4>Hacer una Venta</h4>
</div>
</div>
</header>
<table class="table">
  <thead class="alert-info">
    <tr>
      <th scope="col">ID Articulo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Imagen</th>
      <th scope="col">Categoria</th>
      <th scope="col">Precio</th>
      <th scope="col">Eliminar</th>
      <th scope="col">Actualizar</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $query = "SELECT * From articulos";
        $resultado = $con -> query($query);
        $count = 0;
        while($row=$resultado->fetch_assoc()){
          $count++;
        ?>
           <tr>
              <td><?php echo $idArt = $row['idArt'];?></td>
              <td><?php echo $NombreArt = $row['NombreArt'];?></td>
              <td><?php echo $DescripcionArt = $row['DescripcionArt'];?></td>
              <td><img  src="./image/<?php echo $row['ImageArt'];?>"width="100px" height="100px"></td>
              <?php
                 if($row['idCat'] == 1){
                 ?>  <td><p>Phone</p></td> <?php
                 }
                 if($row['idCat'] == 2){
                  ?>  <td><p>Computer</p></td> <?php
                 }
                 if($row['idCat'] == 3){
                  ?>  <td><p>Television</p></td> <?php
                 }
              ?> 
              <td><?php echo $Precio = $row['Precio'];?></td>
              <td><button type="button" class="btn btn-danger"><a class="btn btn-danger" onclick="DeleteConfirm()" href="Eliminar.php?Getid=<?php echo $idArt= $row['idArt']; ?>">Delete</a></button>
              <td><button type="button" class="btn btn-success"><a class="btn btn-success" href="Update.php?Getid=<?php echo $idArt= $row['idArt']; ?>">Update</a></button>
            </td>         
            </tr>
            <script>
               function DeleteConfirm() {
                   confirm("Perdera todo la data");
               }
 </script>
        <?php
        }
        ?>
  </tbody>
</table>
</body>
</html>