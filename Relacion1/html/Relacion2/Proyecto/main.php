<?php 

    session_start() ;
    require_once "modelos/Usuario.php";

    $usuario = unserialize($_SESSION["usuario"]) ;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Agendaw</title>
</head>

<body>

    <div class="container mt-4">

        <h1 class="text-center mb-4">Agendaw</h1>

        <h6>Bienvenido/a <?=$usuario->getNombre() ?></h6>

        <div class="d-flex flex-row-reverse">
            <a class="btn btn-dark mx-2" href="./logout.php">Salir</a>
            <a class="btn btn-primary" href="./insertar.php">Nuevo contacto</a>

        </div>
    </div>

</body>

</html>