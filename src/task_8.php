<?php
/*
T(n) = c1(2n - 1) + c2(n - 1) + c3(n - 1) + c4(n - 1) + c5(n - 1);

c5 ==>
T(m) = 8 + 2log(m) / 2 + 1 + 2log(m) / 2 - 1 + log(m) + 1 + 3log(m) = 8 + 2log(m) + 4log(m) + 1 = 6log(m) + 9;

T(n) = 5n - 4 + (n - 1)(6log(n - 1) + 9) = 5n - 4 + 9n - 9 + n*6log(n - 1);
=> 14n - 13 + n*log(n)
=> n + n*log(n)
=> n*log(n)
 */
function mergeSort(&$A, $p, $r)
{
    if ($p < $r) {                                        // 2n - 1
        $q = floor(($p + $r) / 2);                  // n - 1
        mergeSort($A, $p, $q);                         // n - 1
        mergeSort($A, $q + 1, $r);                 // n - 1
        merge($A, $p, $q, $r);                         // n - 1
    }
}

function merge(&$A, $p, $q, $r)                           // m = n - 1
{
    // numbers :
    $n1 = $q - $p + 1; // left part                       // 1
    $n2 = $r - $q; // right part                          // 1

    $L = [];                                              // 1
    $R = [];                                              // 1

    for ($i = 1; $i <= $n1; $i++) {                       // m/2 + 1
        $L[$i] = $A[$p + $i - 1];                         // m/2
    }

    for ($j = 1; $j <= $n2; $j++) {                       // m/2
        $R[$j] = $A[$q + $j];                             // m/2 - 1
    }

    $L[$n1 + 1] = 10000000;                               // 1
    $R[$n2 + 1] = 10000000;                               // 1

    $i = 1;                                               // 1
    $j = 1;                                               // 1

    for ($k = $p; $k <= $r; $k++) {                       // m + 1
        if($L[$i] <= $R[$j]) {                            // m
            $A[$k] = $L[$i];                              // a (m - b)
            $i = $i + 1;                                  // c (m - d)
        } else {
            $A[$k] = $R[$j];                              // b (m - a)
            $j = $j + 1;                                  // d (m - c)
        }
    }
}

$A = [0 ,5, 2, 4, 7, 1, 3, 2, 6];
mergeSort($A, 0, count($A) - 1);
echo json_encode($A);
