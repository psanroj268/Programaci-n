<?php

function printr($x, $y)
{

    if ($y == 0) {
        echo "<pre>" . print_r($x, true) . "</pre>";
    } else {
        print_r($x);
    }
}

printr($GLOBALS, 0);


function multiplicar(int $a, int $b):int { return $a * $b; }

/**
 * @param int $a
 * @param int $b
 * @param int $
 */