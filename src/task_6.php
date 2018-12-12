<?php
$defaultBase = 11;
$shortOptions = 'b:';
$longOptions = ['base:'];
$baseCliVar = array_values(getopt($shortOptions, $longOptions))[0];
$baseCli = $baseCliVar ?: $argv[1];

$base = $baseCli ?: $defaultBase;
$d = $base;

while ($base > 0) {
    $base -= 1;
    $spaces = str_repeat(' ', $base);
    $stars = str_repeat('* ', $d - $base);
    echo $spaces . $stars, PHP_EOL;
    if ($base > 0) {
        $base -= 1;
    }
    if (!$base) {
        $base += $d % 2 ? 2 : 3;
        while ($base < $d) {
            $stars = str_repeat('* ', $d - $base);
            $spaces = str_repeat(' ', $base);
            echo $spaces . $stars, PHP_EOL;
            $base += 2;
            if ($base >= $d) {
                die();
            }
        }
    }
}
