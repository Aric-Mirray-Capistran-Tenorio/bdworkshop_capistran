<?php session_start(); ?>
<html>
<head>
	<title>Inciar Sesion</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['iniciar'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['nombre']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['contraseña']);

	if($user == "" || $pass == "") {
		echo "El campo Usuario o Contraseña esta vacio.";
		echo "<br/>";
		echo "<a href='sesion.php'>Regresar</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE nombre_usuario='$user' AND contrasena='$pass'")
					or die("Este no ejecuta la seleccion query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser         = $row['nombre_usuario'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['nombre']= $row['nombre'];
			$_SESSION['id']    = $row['id'];
		} else {
			echo "Usuario o Contraseña invalidos.";
			echo "<br/>";
			echo "<a href='sesion.php'>Regresar</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Iniciar Sesion</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre del Usuario</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contraseña"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="iniciar" value="Iniciar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
