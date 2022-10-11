<?php

$s = array(5, 1, 3, 4);
$v = array(3, 4, 5, 1);

$cuenta = 0;
$circular = false;

foreach ($s as $contador) {
    $cuenta++;
}

for ($i = 0; $i < $cuenta; $i++) {
    if ($s[$i] == $v[0]) {
        $cuenta2 = $i;
        $i = 5;
    }
}

$z = 0;

for ($i = $cuenta2; $i < $cuenta; $i++) {
    if ($s[$i] == $v[$z]){
        $circular = true;
        $z++;
    } else {
        $circular = false;
    }
}

for ($i = 0 ; $i < $cuenta2; $i++) {
    if ($s[$i] == $v[$z]){
        $circular = true;
        $z++;
    } else {
        $circular = false;
    }
}

if ($circular == true) {
    echo "Son circulares";
} else {
    echo "No son circulares";
}
