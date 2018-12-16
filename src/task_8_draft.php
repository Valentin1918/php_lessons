<?php
$B = [0 ,5, 2, 4, 7, 1, 3, 2, 6];
$A = [0 ,5, 2, 4, 7, 1, 3, 2, 6, 0, 65, 27, 48, 79, 16, 34, 22, 61, 0, 54, 24, 46, 77, 39, 20, 69, 0 ,5, 2, 4, 7, 1, 3, 2, 6, 0, 65, 27, 48, 79, 16, 34, 22, 61, 0, 564, 24, 46, 77, 168, 379, 280, 699, 0 ,59, 2, 49, 79, 19, 39, 2, 6, 0, 695, 27, 48, 709, 106, 34, 22, 661, 660, 574, 24, 496, 77, 18, 39, 20, 69];
$mSCounter = 0;
$mCounter = 0;

function mergeSort(&$A, $p, $r, &$mSCounter, &$mCounter)
{
    $mSCounter++;
    //    $A = [0 ,5, 2, 4, 7, 1, 3, 2, 6]; // n === 9;
    //    0-------------------------------------------8
    //    0---------------------4                     5---------------------8
    //    0----------2          3----------4          5----------6          7----------8
    //    0-----1    2--2       3--3       4--4       5--5       6--6       7--7       8--8
    //    0--0  1--1
    if ($p < $r) {                                                               // 2n - 1
        $q = floor(($p + $r) / 2);                                         // n - 1
        mergeSort($A, $p, $q, $mSCounter, $mCounter);                 // n - 1
        mergeSort($A, $q + 1, $r, $mSCounter, $mCounter);          // n - 1
        merge($A, $p, $q, $r, $mCounter);                                 // n - 1
    }
}

mergeSort($A, 0, count($A) - 1, $mSCounter, $mCounter);
echo json_encode($A);
echo PHP_EOL;
echo count($A);
echo PHP_EOL;
echo $mSCounter; // 2n
echo PHP_EOL;
echo $mCounter; // n

function merge(&$A, $p, $q, $r, &$mCounter)
{

                                    // m = n - 1
    // numbers :
    $n1 = $q - $p + 1; // left part // 1
    $n2 = $r - $q; // right part    // 1

    $L = [];                        // 1
    $R = [];                        // 1

    for ($i = 1; $i <= $n1; $i++) { // m/2 + 1
        $mCounter++;
        $L[$i] = $A[$p + $i - 1];   // m/2
    }

    for ($j = 1; $j <= $n2; $j++) { // m/2
        $mCounter++;
        $R[$j] = $A[$q + $j];       // m/2 - 1
    }

    $L[$n1 + 1] = 10000000;         // 1
    $R[$n2 + 1] = 10000000;         // 1

    $i = 1;                         // 1
    $j = 1;                         // 1

    for ($k = $p; $k <= $r; $k++) { // m + 1
        if($L[$i] <= $R[$j]) {      // m
            $A[$k] = $L[$i];        // a (m - b)
            $i = $i + 1;            // c (m - d)
        } else {
            $A[$k] = $R[$j];        // b (m - a)
            $j = $j + 1;            // d (m - c)
        }
    }
}