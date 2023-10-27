<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Agregar Datos</title>
</head>

<body>
<?php
//including the database connection file
include_once("conexion.php");

if(isset($_POST['Submit'])) {	
	$ubicacion = $_POST['ubicacion'];
	$cant_tecnicos = $_POST['ctecnicos'];
	$tamano = $_POST['tamano'];
	$num_oficinas = $_POST['numoficinas'];
	$cant_maquinas = $_POST['cantmaquinas'];
	$contacto = $_POST['contacto'];
	$cod_postal = $_POST['codpostal'];	
	$login_id = $_SESSION['id'];
	// checking empty fields
	if(empty($ubicacion) || empty($cant_tecnicos) || empty($tamano) 
	|| empty($num_oficinas) || empty($cant_maquinas) || empty($contacto) || empty($cod_postal)) {
		
		
		if(empty($ubicacion)) {
			echo "<font color='red'>El campo de ubicacion está vacío.</font><br/>";
		}
		
		if(empty($cant_tecnicos)) {
			echo "<font color='red'>El campo de cant_tecnicos está vacío.</font><br/>";
		}
		
		if(empty($tamano)) {
			echo "<font color='red'>El campo de tamaño está vacío.</font><br/>";
		}
		
		if(empty($num_oficinas)) {
			echo "<font color='red'>El campo de num_oficinas está vacío.</font><br/>";
		}
		
		if(empty($cant_maquinas)) {
			echo "<font color='red'>El campo de cant_maquinas está vacío.</font><br/>";
		}
		
		if(empty($contacto)) {
			echo "<font color='red'>El campo de contacto está vacío.</font><br/>";
		}
		
		if(empty($cod_postal)) {
			echo "<font color='red'>El campo de precio está vacío.</font><br/>";
		}		
		echo "<br/><a href='javascript:self.history.back();'>Regresar</a>";
		
		//link to the previous page
		
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO taller(ubicacion, cant_tecnicos, tamano_mts, num_oficinas, cant_maquinas, contacto, cod_postal, login_id) VALUES('$ubicacion','$cant_tecnicos','$tamano', '$num_oficinas', '$cant_maquinas', '$contacto', '$cod_postal', '$login_id')");
			
		//display success message
		echo "<font color='green'>Datos agregados exitosamente.";
		echo "<br/><a href='ver_tabla.php'>Ver Resultados</a>";
	}
}

?>
</body>
</html>
