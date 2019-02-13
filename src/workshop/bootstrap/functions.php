<?php

function p()
{
    echo '<pre>';
    foreach (func_get_args() as $argument) {
        print_r($argument);
        echo PHP_EOL.PHP_EOL;
    }
    echo '</pre>';
}

function pd()
{
    call_user_func_array('p', func_get_args());
    die;
}