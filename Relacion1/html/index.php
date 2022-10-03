<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>

<body>
    <?php

    echo "<h1><b>Hola mundo</b></h1>";

    echo "Comentario ", "con ", "varios ", "argumentos";
    print "<br/>Comentario con print<br/>";

    // Variables
    $a = 0;
    $A = 10;
    $_a = 1;
    $_a1 = 2;

    // Variables con nombre dinámico
    $color = "azul";
    $$color = "claro"; /*La variable $color tendrá el valor azul
                            y la variable $$color pasa a llamarse $azul 
                            y tiene el valor claro*/

    print_r($_SERVER); // Muestra información de la variable

    echo "<br><br>";

    var_dump($color); // Muestra información de la variable

    // Variables superglobales
    // - Predefinidas en PHP
    // - Disponibles en cualquier ámbito

    // $_SERVER
    // $_GET, $_POST
    // $_FILES
    // $_COOKIE
    // $_SESSION
    // $_REQUEST
    // $GLOBALS

    // Constantes
    define("PI", 3.1416); // define en tiempo de ejecución
    const PI2 = 3.1416; /* define en tiempo de compilación y 
                                se emplea con clases */

    //if (...) define("X", valor) ;  Ejemplo de utilizar la constante define

    // Ámbito 

    // a. Superglobales ------> visibles desde cualquier punto del código
    // b. Constantes ---------> visibles desde cualquier punto del script
    /* c. Variables globales -> visibles desde cualquier punto del script
                                    excepto en el interior de las funciones*/
    /* d. Variable -----------> visibles únicamente en el ámbito donde se
                                    ha definido*/

    // Tipos De Datos

    // Tipos básicos: boolean, integer, string, float
    // Tipos compuestos: array, object [callable, iterable]
    // Tipos especiales: [ resource,] NULL

    // String

    $resultado = 10 * 23.2;

    echo '<br><br>I\'ll be back';
    echo "<br>Ha dicho: \"mañana volveré\"";
    echo "<br>El valor es $resultado";

    // Caracteres de escape

    // \\
    // \'
    // \"
    // \$



    ?>
</body>

</html>