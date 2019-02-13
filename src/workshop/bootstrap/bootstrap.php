<?php

ini_set('display_errors', true); // log error on page

require __DIR__.'/functions.php';

//p(123, 'qwe', [1,2,3], ['df'=>'asd', 'dfdf'=>'eee']); // new PDO()

// Autoloader
spl_autoload_register(function($class) {
    $path = __DIR__.'/../'.str_replace('\\', '/', $class).'.php';
//    pd($class, $path);
    if (file_exists($path)) {
        include $path;
    }
});
