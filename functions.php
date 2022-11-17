<?php

//handig om te debuggen welke inhoud er in een bepaalde variabele zit
function dd($variable = null)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    die();
}

function isUri($pad)
{
    if (parse_url($_SERVER['REQUEST_URI'])['path'] === $pad) {
        return true;
    }
    return false;
}