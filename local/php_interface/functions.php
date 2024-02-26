<?php

function print_preformatted(mixed $var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}