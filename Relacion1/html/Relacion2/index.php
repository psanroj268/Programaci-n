<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>

    <?php

    $datos = [

        [
            "titulo" => "Peaky Blinders",
            "plataforma" => "Netflix",
            "argumento" => "Una familia de pandilleros asentada en Birmingham, Reino Unido, tras la Primera Guerra Mundial (1914-1918), dirige un local de apuestas hípicas.",
            "nota" => 86,
            "poster" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/tNjutGgaJpP30xUhfHihbcDgQUu.jpg"
        ],

        [
            "titulo" => "Los anillos de poder",
            "plataforma" => "Amazon Prime",
            "argumento" => "Un reparto coral de personajes —unos conocidos y otros nuevos— debe afrontar la reaparición del mal en la Tierra Media.",
            "nota" => 77,
            "poster" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/suvlZfDAoq5vfVUrfb468KJhFlL.jpg"
        ],

        [
            "titulo" => "Vikingos",
            "plataforma" => "Netflix",
            "argumento" => "La serie narra las sagas de la banda de hermanos vikingos de Ragnar y su familia, cuando él se levanta para convertirse en el rey de las tribus vikingas.",
            "nota" => 81,
            "poster" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/uNFSCxeZsZVIQ1TrD6mzu6uMQEb.jpg"
        ],

        [
            "titulo" => "Los 100",
            "plataforma" => "Netflix",
            "argumento" => "Situada 97 años después de una guerra nuclear que ha destruido la civilización, los supervivientes de una nave espacial, que han sobrevivido durante 3 generaciones en el espacio",
            "nota" => 79,
            "poster" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/7zzHG46UG43IkfdEVKuCo2L84eM.jpg"
        ],

    ];


    ?>

    <h1>Series que he visto</h1>

    <ul>

        <?php foreach ($datos as $series) : ?>


            <li><?= "<h3>{$series["titulo"]}</h3>" ?>
                <?= "<h5>{$series["nota"]}% - {$series["plataforma"]}</h5>" ?>
                <?= "<p>{$series["argumento"]}</p>" ?></li>

        <?php endforeach; ?>

    </ul>

</body>

</html>