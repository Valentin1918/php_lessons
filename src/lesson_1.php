<?php
//echo 'hello';
//var_export(['argv' => $_SERVER['argv']]);
$shortOptions = 'u:';
$longOptions = ['url:'];

$url = $argv[1]; // 0 - filename, after all split by space
var_export(getopt($shortOptions, $longOptions));
var_export($url);

//PHP_EOL; --> "/n";
