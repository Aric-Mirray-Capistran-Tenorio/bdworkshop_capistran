<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: sesion.php');
}
?>

<?php
//including the database connection file
include_once("conexion.php");
//fetching data in descending order (lastest entry first)
$resultados = mysqli_query($mysqli, "SELECT * FROM taller WHERE login_id=".$_SESSION['id']." ORDER BY login_id DESC");

?>

<html>
<head>
	<title>Página principal</title>
</head>

<body>
	<a href="index.php">inicio</a> | <a href="formulario_agregar.html">Agregar nuevo dato</a> | <a href="cerrar_sesion.php">cerrar sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Numero de Taller</td>
			<td>Ubicacion</td>
			<td>Cantidad de Tecnicos</td>
			<td>Tamaño en Mts</td>
			<td>Numero de Oficinas</td>
			<td>Cantidad de Maquinas</td>
			<td>Contacto</td>
			<td>Codigo Postal</td>
		</tr>
		<?php

			while($res = mysqli_fetch_array($resultados)) {		
				echo "<tr>";
				echo "<td>".$res['num_taller']."</td>";
				echo "<td>".$res['ubicacion']."</td>";
				echo "<td>".$res['cant_tecnicos']."</td>";	
				echo "<td>".$res['tamano_mts']."</td>";	
				echo "<td>".$res['num_oficinas']."</td>";	
				echo "<td>".$res['cant_maquinas']."</td>";	
				echo "<td>".$res['contacto']."</td>";	
				echo "<td>".$res['cod_postal']."</td>";	
				echo "<td><a href=\"editar.php?num_taller={$res['num_taller']}\">Editar</a> | <a href=\"borrar.php?num_taller={$res['num_taller']}\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Borrar</a></td>";		
			}	
	
		?>
	</table>	
</body>
</html>
