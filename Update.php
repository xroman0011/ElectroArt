<?php
include ('include/connect.php');
$id = $_GET['Getid'];
$query1 = "Select * From categoria";
$resultset = mysqli_query($con,$query1);
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
<div class="col-sm-8">
      <form name="edit" method="POST" enctype="multipart/form-data" action="UpdatingArt.php">
           <input type="hidden" name="idArt" class="form-control" value="<?php echo $id?>"/>
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
</body>
</html>