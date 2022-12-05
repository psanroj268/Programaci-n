<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Biblioteca Daw</title>
</head>

<body>

    <?php

    define ("REGISTROS" , 4);

    $p = $_GET["pagina"]??0 ;

    $inicio = $p * REGISTROS;

    require_once 'libro.php';

    try {
        $con = new mysqli("db", "root", "");
        $con->select_db("Biblioteca");
    } catch (mysqli_sql_exception $e) {
        die("** Error de conexión con la base de datos: {$e->getMessage()}");
    }

    $resultado = $con->query("SELECT * FROM libro;") ;
    $total = floor($resultado->num_rows/REGISTROS) ;

    $resultado = $con->query("SELECT * FROM libro LIMIT {$inicio}, ".REGISTROS.";");

    if (!$resultado->num_rows) :

        echo "<div class=\"alert alert-danger\">
            No se han encontrado registros en la base de datos
        </div>" ;
    else :
    ?>
        
        <h1>Libros</h1>
        <div class="container">
        <?php while ($fila = $resultado->fetch_object("libro")) : ?>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?= "{$fila->Imagen}" ?>" class="img-fluid rounded-start" alt="..." width="100%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $fila->titulo ?></h5>
                            <p class="card-text"><?= $fila->autor ?></p>
                            <h5 class="card-text">Detalles del libro</h5>
                            <p class="card-text">Editorial: <?= $fila->editorial ?></p>
                            <p class="card-text">Páginas: <?= $fila->paginas ?></p>
                            <p class="card-text">ISBN: <?= $fila->isbn ?></p>
                            <p class="card-text star">Puntuación: <?= $fila->estrellas($fila->puntuacion) ?></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card-body">
                            <h5>Argumento</h5>
                            <p class="card-text"><?= $fila->argumento ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>


    </div>

    <div class="d-flex justify-content-center mb-4">

    <?php
        echo (!$p) ? "atrás" : "<a href=\"index.php?pagina=" .($p-1). "\">atras</a>";
        echo "&nbsp;|&nbsp;" ;
        echo (!$p) ? "0" : "<a href=\"index.php?pagina=" .($p = 0). "\">0</a>";
        echo "&nbsp;|&nbsp;" ;
        echo ($p == $total) ? "1" : "<a href=\"index.php?pagina=" .($p = 1). "\">1</a>";
        echo "&nbsp;|&nbsp;" ;
        echo ($p == $total) ? "2" : "<a href=\"index.php?pagina=" .($p = 2). "\">2</a>";
        echo "&nbsp;|&nbsp;" ;
        echo ($p == $total) ? "siguiente" : "<a href=\"index.php?pagina=" .($p+1). "\">siguiente</a>";

    ?>

    </div>
    <?php
    endif;
    ?>

    


</body>

</html>

<?php
$con->close();
?>