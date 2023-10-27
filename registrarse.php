<html>
<head>
	<title>Registrarse</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['registrar'])) {
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$usuario = $_POST['nomusuario'];
	$pass = $_POST['contraseña'];

	if($usuario == "" || $pass == "" || $nombre == "" || $email == "") {
		echo "Todos los campos deben ser llenados, uno o mas campos estan vacios.";
		echo "<br/>";
		echo "<a href='registrarse.php'>Regresar</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(nombre, email, nombre_usuario, contrasena) VALUES('$nombre', '$email', '$usuario', '$pass')")
			or die("No se pudo ejecutar la consola de insersion.");
			
		echo "Registro exitoso";
		echo "<br/>";
		echo "<a href='sesion.php'>Iniciar Sesion</a>";
	}
} else {
?>
	<p><font size="+2">Registrarse</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre Completo</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Nombre de Usuario</td>
				<td><input type="text" name="nomusuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contraseña"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="registrar" value="Registrarse"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
