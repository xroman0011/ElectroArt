<?php 
require "include/connect.php";
$idventa = mysqli_real_escape_string($con, $_GET['Getid']);
$subtotal = mysqli_real_escape_string($con, $_POST['SubTotal']);
$impuesto = mysqli_real_escape_string($con, $_POST['Impuesto']);
$total = mysqli_real_escape_string($con, $_POST['Total']);   

$sql = "INSERT INTO procventa (idVenta, SubTotal, Impuesto, Total)
VALUES ('$idventa', '$subtotal', '$impuesto', '$total')";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar usuario</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
    </head>
<body>
<nav>
<?php include('include/menu.php');?>
</nav>
<?php
if ($con -> query($sql) == TRUE) {
    echo "<h2>New record created successfully</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
?>

            

<?php
mysqli_close($con);
?>

    </body>
</html>
