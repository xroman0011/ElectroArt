<?php
include ('include/connect.php');
$query1 = "Select * From categoria";
$resultset = mysqli_query($con,$query1);
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
<h1>Electronic Art</h1>
<div class="container">
<h4>Entrada de Inventario</h4>
</div>
</div>
</header>
<div class="col-sm-8">
      <form name="edit" method="POST" enctype="multipart/form-data" action="addingArt.php">
           <input type="hidden" name="idArt" class="form-control" value=""/>
               <div class="form-group">
                   <label class="col-sm-2">Nombre del articulo:</label>
                   <input type="text" name="NombreArt" class="from-control" value=""/>
               </div>
               <div class="form-group">
                      <label class="form-label">Descripcion:</label>
                      <textarea name="DescripcionArt" class="form-control" value="" rows="3"></textarea>
               </div>
               <div class="form-group">
                   <label class="col-sm-2">Imagen:</label>
                   <input type="file" name="ImageArt" class="from-control" value=""/>
               </div>
               <div class="form-group">
                   <label class="col-sm-2">Categoria:</label>
                   <select name="idCat" class="form-control">
                        <option value="" SELECTED>Seleccionar Categoria</option>
                             <?php
                                while($row = $resultset->fetch_assoc()) {
                                    $id_cat=$row['idCat'];
                                    $namecat=$row['NombreCat'];
                                    echo "<option>$id_cat.&nbsp;$namecat</option>";
                                }
                             ?>
                    </select>          
               </div>
               <div class="form-group">
                   <label class="col-sm-2">Precio:</label>
                   <input type="text" name="Precio" class="from-control" value=""/>
               </div> 
               <div>
                     <button type="submit" name="Save" class="btn btn-success">Enviar</button>
                     <button type="button" name="Return" onclick="history.back()" class="btn btn-primary">Regresar</button>
               </div>                
      </form>
      
</div>

</html>