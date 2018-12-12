<?php
$i = 5;
$n = 5;

while ($i--) {
    $spaces = str_repeat(' ', $i);
    $stars = str_repeat('* ', $n - $i);
    echo $spaces . $stars, PHP_EOL;
}
