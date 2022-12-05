<?php

    require_once "modelos/Usuario.php" ;
    require_once "lib/Database.php";

    session_start();
    
    if (!empty($_POST)):

        $nombre =        $_POST['nombre'];
        $apellido =      $_POST['apellido'];
        $telefono =      $_POST['telefono'];
        $email =         $_POST['email'];
        $foto =          $_POST['foto'];
        $observaciones = $_POST['observaciones'];

        //
        $usuario = unserialize($_SESSION["usuario"]);
        
        $db = Database::getDatabase();
        
        $resultado = $db->escape($_POST) ;

        //
        $sql = "INSERT INTO contactos VALUES (null, {$usuario->getIdUsu()} , '{$nombre}',  '{$apellido}', '{$telefono}', '{$email}', '{$foto}', '{$observaciones}');" ;
        
        $db->query($sql);

        header("location: main.php");

    endif;

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

        <form method="post">
            <div class="card mx-auto shadow" style="max-width: 40rem;">
                <div class="card-body">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Nombre</span>
                            </div>
                        <input class="form-control mb-2" type="nombre" name="nombre" placeholder="Pablo" required>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Apellido</span>
                            </div>
                        <input class="form-control mb-2" type="apellido" name="apellido" placeholder="Sanchez" required>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Telefono</span>
                            </div>
                        <input class="form-control mb-2" type="telefono" name="telefono" placeholder="+34 (... ... ...)" required>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Email</span>
                            </div>
                        <input class="form-control mb-2" type="email" name="email" placeholder="usuario@email.com">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Foto(url)</span>
                            </div>
                        <input class="form-control mb-4" type="foto" name="foto" placeholder="http://...">
                        </div>

                        
                       <strong>Observaciones:</strong>
                       <textarea name="observaciones" class="form-control w-100 mb-4 mt-1" cols="30" rows="5" placeholder="Escribe Aquí"></textarea>


                        <button class="btn btn-primary w-100 mb-2">Registrar</button>
                        <button class="btn btn-danger w-100">Cancelar</button>
                    </div>
                </div>
            </div>

        </form>

    </div>

</body>

</html>