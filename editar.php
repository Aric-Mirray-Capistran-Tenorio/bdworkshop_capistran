<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("conexion.php");

if(isset($_POST['actualizar']))
{	
	$num_taller = $_POST['num_taller'];
	$ubicacion = $_POST['ubicacion'];
	$cant_tecnicos = $_POST['ctecnicos'];
	$tamano = $_POST['tamano'];
	$num_oficinas = $_POST['numoficinas'];
	$cant_maquinas = $_POST['cantmaquinas'];
	$contacto = $_POST['contacto'];
	$cod_postal = $_POST['codpostal'];
	
	// checking empty fields
	if(empty($ubicacion) || empty($cant_tecnicos) || empty($tamano) 
	|| empty($num_oficinas) || empty($cant_maquinas) || empty($contacto) || empty($cod_postal)) {
		
		if(empty($ubicacion)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($cant_tecnicos)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($tamano)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($num_oficinas)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($cant_maquinas)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($contacto)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($cod_postal)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE taller SET ubicacion='$ubicacion', cant_tecnicos='$cant_tecnicos', tamano_mts='$tamano', num_oficinas='$num_oficinas', cant_maquinas='$cant_maquinas', contacto='$contacto', cod_postal='$cod_postal'  WHERE num_taller=$num_taller");
	
		//redirectig to the display page. In our case, it is view.php
		header("Location: ver_tabla.php");
	}
}
?>
<?php
//getting id from url
$num_taller = $_GET['num_taller'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM taller WHERE num_taller=$num_taller");

while($res = mysqli_fetch_array($result))
{
	$ubicacion =     $res['ubicacion'];
	$cant_tecnicos = $res['cant_tecnicos'];
	$tamano =        $res['tamano_mts'];
	$num_oficinas =  $res['num_oficinas'];
	$cant_maquinas = $res['cant_maquinas'];
	$contacto =      $res['contacto'];
	$cod_postal =    $res['cod_postal'];
}
?>
<html>
<head>	
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">inicio</a> | <a href="vertabla.php">Ver Productos</a> | <a href="cerrar.php">Cerrar Sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>Ubicacion</td>
				<td><input type="text" name="ubicacion" value="<?php echo $ubicacion;?>"></td>
			</tr>
			<tr> 
				<td>Cantidad de tecnicos</td>
				<td><input type="text" name="ctecnicos" value="<?php echo $cant_tecnicos;?>"></td>
			</tr>
			<tr> 
				<td>Tamaño del Taller</td>
				<td><input type="text" name="tamano" value="<?php echo $tamano;?>"></td>
			</tr>
			<tr> 
				<td>Numero de Oficinas</td>
				<td><input type="text" name="numoficinas" value="<?php echo $num_oficinas;?>"></td>
			</tr>
			<tr> 
				<td>Cantidad de Maquinas</td>
				<td><input type="text" name="cantmaquinas" value="<?php echo $cant_maquinas;?>"></td>
			</tr>
			<tr> 
				<td>Contacto</td>
				<td><input type="text" name="contacto" value="<?php echo $contacto;?>"></td>
			</tr>
			<tr> 
				<td>Codigo Postal</td>
				<td><input type="text" name="codpostal" value="<?php echo $cod_postal;?>"></td>
			</tr>
			<td>
				<input type="hidden" name="num_taller" value="<?php echo $num_taller ?>"></td>
			<td>
			<tr>
				<td><input type="submit" name="actualizar" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
