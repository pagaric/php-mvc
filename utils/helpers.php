<?php

function sayHello()
{
    return 'Hello World !';
}

function dump($var, $die = true)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    if($die){die();}
}