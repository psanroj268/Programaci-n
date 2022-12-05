<?php

if (!empty($_POST)) :

    // recuperamos información del formulario
    $email = $_POST["email"];
    $clave = md5($_POST["pass"]);

    //
    require_once "lib/Database.php";
    require_once "modelos/Usuario.php";

    //
    $db = Database::getDatabase();
    $datos = $db->escape($_POST) ;

    $db->query("SELECT * FROM usuario WHERE email = '$email' AND clave = '".md5($datos["$clave"])."' ;");

    $usuario = $db->getData("Usuario") ;

    //
    if ($usuario == null): $error = "Nombre de usuario o contraseña incorrectos" ;
    else:

        session_start() ;

        $_SESSION["inicio"] = time();
        $_SESSION["usuario"] = serialize($usuario);

        header("location: main.php") ;

    endif;

    echo "<pre>", print_r($usuario, true),"</pre>";
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
            <div class="card mx-auto" style="max-width: 20rem;">
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control w-100 mb-2" type="email" name="email" placeholder="usuario@email.com" required>
                        <input class="form-control w-100 mb-4" type="password" name="pass" placeholder="Contraseña" required>
                        
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger">
                                <strong><?= $error ?></strong>
                            </div>

                        <?php endif; ?>

                        <button class="btn btn-primary w-100 mb-2">Entrar</button>
                        <button class="btn btn-outline-dark w-100">Registrar</button>
                    </div>
                </div>
            </div>

        </form>
    </div>

</body>

</html>