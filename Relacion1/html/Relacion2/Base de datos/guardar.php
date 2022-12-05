<?php

	if (empty($_POST)) 	 	
	 	exit(header("location: insertar.php")) ;

	session_start() ;

    require_once "librerias.php";

	// Comprobación del checksum
	comprobarCSRF($_POST["_csrf"], "insertar.php") ;
	
	$nombre = $_POST["nom"] ;
	$precio = $_POST["pre"] ;

	if (empty($nombre) or empty($precio))
		exit(header("location: insertar.php?err")) ;

	// importamos la librería
	require_once "database.php" ;

	$sql = "INSERT INTO fruta
		    VALUES (null, \"{$nombre}\", {$precio}) ;" ;

	if (!$con->query($sql))
		die("*** Error de con el motor de bases de datos.") ;

	header("location: conexion.php") ;