<?php
	
	$idcon = $_GET["id"]??null ;

	// Si se me pasa un identificador de usuario, lo borramos
	if (!is_null($idcon)):

		require_once "modelos/Contacto.php" ;

		// recuperamos el contacto
		$con = Contacto::getById($idcon) ;

		// comprobamos si el contacto existe y, si es así, 
		// lo borramos.
		if ($con) $con->delete() ;

		// redirigimos al main
		header("location: main.php") ;

	endif ;