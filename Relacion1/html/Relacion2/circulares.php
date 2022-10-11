<?php

$s = array(1, 0, 1, 1);
$v = array(1, 1, 1, 0);

$cuenta = 0;
$circular = false;

foreach ($s as $contador) {
    $cuenta++;
}

for ($i = 0; $i < $cuenta; $i++) {
    if (($s[$i] == $v[0]) && ($s[$i + 1] == $v[1])){
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
