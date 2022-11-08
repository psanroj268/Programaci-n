<?php

    $id = $_POST["id"] ;
	
    $con = new mysqli("db", "root", "");
    $con->select_db("mibasedatos");

    $con->query('DELETE FROM frutas WHERE idFru = '.$id) ;

    header("location:conexion.php");
	

