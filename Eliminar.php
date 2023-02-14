<?php
include ('include/connect.php');
$id = $_GET['Getid'];
$query = "DELETE FROM articulos WHERE idArt = '$id';";
$result = mysqli_query($con, $query);
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
<h4>Eliminar Record</h4>
</div>
</div>
</header>

</body>
<style>
h2 {
    text-align: center;
}
</style>
<?php

if ($result) {
    echo "<h2>Record deleted</h2>";
} else {
    echo "<h2>Error deleting record</h2>";
}
?>
</html>