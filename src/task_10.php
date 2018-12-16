<?php
$A = [0, 0, 5, 2, 4, 7, 0, 0, 1, 3, 2, 6, 0, 0];

function bubbleSort(&$A)
{
    for ($i = 1; $i <= count($A) - 1; $i++) {
        for ($j = count($A) - 1; $j > $i + 1; $j--) {
            if ($A[$j] < $A[$j - 1]) {
                $tmp = $A[$j];
                $A[$j] = $A[$j - 1];
                $A[$j - 1] = $tmp;
            }
        }
    }
}

bubbleSort($A);
echo json_encode($A);
