<?php
	// Datos de conexion a la base de datos
	$servidor='localhost';
	$usuario='pwexor5_admpwex';
	$pass='BDpw%0169';
	$bd='pwexor5_platformpwex';
	// Nos conectamos a la base de datos
	$conexion = new mysqli($servidor, $usuario, $pass, $bd);	
	// Definimos que nuestros datos vengan en utf8
	$conexion->set_charset('utf8');
	// verificamos si hubo algun error y lo mostramos
	if ($conexion->connect_errno) {
		echo "Error al conectar la base de datos {$conexion->connect_errno}";
	}
?>
