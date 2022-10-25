<?php
    session_start() ;

    if (!isset($_SESSION["usuario"])) header("location: formulario.php") ;

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