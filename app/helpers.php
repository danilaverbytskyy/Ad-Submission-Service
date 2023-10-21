<?php
function redirect($path)
{
    header("Location: $path");
    exit;
}

function dd($data) : void {
    var_dump($data);
    die;
}