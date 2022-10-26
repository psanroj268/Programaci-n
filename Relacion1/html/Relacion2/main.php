<?php
    session_start() ;

    if (!isset($_SESSION["usuario"])) header("location: formulario.php") ;

    if ($_SESSION["autentificado"] == "SI"){
        $fechaGuardada = $_SESSION["inicio"];
        $ahora = date("Y-n-j H:i:s");
        $tiempoTranscurrido = (strtotime($ahora)-strtotime($fechaGuardada));

        if ($tiempoTranscurrido >= 300){
            session_destroy();
            //header("location:formulario.php");
        } else {
            $_SESSION["time"] = $ahora;
        }
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Bienvenido/a <?= $_SESSION["usuario"] ?></h1>

    <br/>
    <a href="logout.php">Desconectar</a>

</body>
</html>