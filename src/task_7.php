<?php
$defaultBase = 5;
$shortOptions = 'b:';
$longOptions = ['base:'];
$baseCliVar = array_values(getopt($shortOptions, $longOptions))[0];
$baseCli = $baseCliVar ?: $argv[1];

$base = $baseCli ?: $defaultBase;
$i = 0;
$arr = [];
while ($i < $base ** 2) {
    $intDiv = intdiv($i, $base);
    $arr[$intDiv][] = $i + 1;
    $i++;
}
$i = 0;
while ($i < $base) {
    if ($i % 2) {
        $arr[$i] = array_reverse($arr[$i]);
    }
    $i++;
}
$x = 0;
while ($x < $base) {
    $y = 0;
    while ($y < $base) {
        echo $arr[$y][$x] . ' ';
        $y++;
    }
    echo PHP_EOL;
    $x++;
}
