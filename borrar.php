<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include("conexion.php");

//getting id of the data from url
$numtaller = $_GET['num_taller'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM taller WHERE num_taller=$numtaller");

//redirecting to the display page (view.php in our case)
header("Location:ver_tabla.php");
?>

