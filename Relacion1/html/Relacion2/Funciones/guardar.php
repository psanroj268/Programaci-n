<?php

	if (empty($_POST)) 	 	
	 	exit(header("location: formulario.php")) ;

	session_start() ;
	
	$ISBN = $_POST["isbn"] ;
    $titulo = $_POST["titu"] ;
    $autor = $_POST["aut"] ;
    $editorial = $_POST["edi"] ;
    $pagina = $_POST["pag"] ;
    $puntuacion = $_POST["pun"] ;
    $argumento = $_POST["argu"] ;
	$imagen = $_POST["img"] ;

	if (empty($ISBN) or empty($titulo) or empty($autor) or empty($editorial) or empty($pagina) or empty($puntuacion) or empty($argumento) or empty($imagen))
		exit(header("location: insertar.php?err")) ;

	// importamos la librería
	require_once "indexb.php" ;

	$sql = "INSERT INTO libros
		    VALUES (\"{$ISBN}\", \"{$titulo}\", \"{$autor}\", \"{$editorial}\", \"{$pagina}\", \"{$puntuacion}\", \"{$argumento}\", \"{$imagen}\") ;" ;

    $con->query($sql);

	if (!$con->query($sql))
		die("*** Error de con el motor de bases de datos.") ;
        

	header("location: index.php") ;