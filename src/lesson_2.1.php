<?php
$height = 5;
$spaces = $height;

for ($i = 0; $i < $height; $i++) {
    for ($k = --$spaces; $k >= 0; $k--) {
        echo ' ';
    }

    for ($j = 0; $j <= $i; $j++) {
        if ($j >= 1) {
            echo ' ';
        }
        echo '*';
    }
    echo PHP_EOL;
}
