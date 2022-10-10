<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>
<body>
    <?php

$a = 4;

for ($i = 1; $i <= $a; $i++) {

    for ($x = 1; $x <= $a - $i; $x++) {
        echo "&nbsp";
    }
    $z = 2;
    for ($j = 1; $j <= ($i * 2) - 1; $j++) {

        if ($j > $i) {

            $l = ($j - $z);

            echo "$l";
            $z += 2;
        } else {
            echo "$j";
        }
    }
    echo "<br/>";
}
?>
</body>
</html>


