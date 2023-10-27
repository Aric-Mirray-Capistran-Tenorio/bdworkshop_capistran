<?php session_start(); ?>
<html>
<head>
	<title>Inicio</title>
	<link href="stilos.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido a WorkShop!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$resultados = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenido <?php echo $_SESSION['nombre'] ?> ! <a href='cerrar_sesion.php'>Cerrar Sesion</a><br/>
		<br/>
		<a href='ver_tabla.php'>Ver y Agregar Productos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Deber iniciar sesion para ver los productos.<br/><br/>";
		echo "<a href='sesion.php'>Iniciar Sesion</a> | <a href='registrarse.php'>Registrarse</a>";
	}
	?>
	<div id="footer">
		Creado por <a href="https://aric-mirray-capistran-tenorio.github.io/WORKSHOP/" title="Autor">Aric Capistran Tenorio</a>
	</div>
</body>
</html>
