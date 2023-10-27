<?php

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

$servidormysql = 'localhost';
$usuario = 'root';
$nombre_bd = 'bdworkshoptenorio';
$pass = '';
$mysqli = mysqli_connect($servidormysql, $usuario, $pass, $nombre_bd);
	
?>
