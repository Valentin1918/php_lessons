<?php
$A = [0, 0, 5, 2, 4, 7, 0, 0, 1, 3, 2, 6, 0, 0];

function mergeSort(&$A, $p, $r)
{
    if ($p < $r) {
        $q = floor(($p + $r) / 2);
        mergeSort($A, $p, $q);
        mergeSort($A, $q + 1, $r);
        merge($A, $p, $q, $r);
    }
}

mergeSort($A, 0, count($A) - 1);
echo json_encode($A);

function merge(&$A, $p, $q, $r)
{
    $n1 = $q - $p + 1; // left part
    $n2 = $r - $q; // right part

    $L = [];
    $R = [];

    for ($i = 1; $i <= $n1; $i++) {
        $L[$i] = $A[$p + $i - 1];
    }

    for ($j = 1; $j <= $n2; $j++) {
        $R[$j] = $A[$q + $j];
    }

    $i = 1;
    $j = 1;

    for ($k = $p; $k <= $r; $k++) {
        if($L[$i] > $R[$j]) {
            $A[$k] = $L[$i] ?: 0;
            $i = $i + 1;
        } else {
            $A[$k] = $R[$j] ?: 0;
            $j = $j + 1;
        }
    }
}
