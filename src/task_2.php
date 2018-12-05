<?php
error_reporting(E_ALL);

if (PHP_SAPI === 'fpm-fcgi') {
    $envCount = count($_SERVER);
    echo "There is {$envCount} env variables.<br>";
    $key = array_keys($_SERVER)[0];
    $value = $_SERVER[$key];
    echo "First env variable is:<br>";
    echo "{$key}: {$value}<br>";
    echo "All other env variables are below:<br>";
    $allWoFirstEnvVars = $_SERVER;
    array_shift($allWoFirstEnvVars);
    foreach ($allWoFirstEnvVars as $key => $value) {
        echo "{$key}: {$value}<br>";
    }
} else if (PHP_SAPI === 'cli') {
    var_export($_SERVER);
}
