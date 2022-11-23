<?php

//handig om te debuggen welke inhoud er in een bepaalde variabele zit
function dd($variable = null): void
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    die();
}

function isUri($pad): bool
{
    if (parse_url($_SERVER['REQUEST_URI'])['path'] === $pad) {
        return true;
    }
    return false;
}

//Deze functie haalt configuratie parameters op. Gebruik een . om nested items op te halen
//bijvoorbeeld config('database.user')
function config($param): string
{
    global $config;
    $path_items = explode(".", $param);
    $result = $config;
    foreach ($path_items as $item) {
        if (isset($result[$item]))
            $result = $result[$item];
        else {
            dd("config param " . $param . " bestaat niet");
        }
    }
    return $result;
}

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

function hasRole($role): bool
{
    if (isset($_SESSION['user']) and $_SESSION['user']['role'] == $role) {
        return true;
    }
    return false;
}

function isLogin(): bool
{
    if ($_SESSION['user']['id'] ?? false) {
        return true;
    }
    return false;
}

function username(): string
{
    if (isLogin()) {
        return $_SESSION['user']['voornaam'] . " " .
            $_SESSION['user']['tussenvoegsel'] . " " .
            $_SESSION['user']['achternaam'];
    }
    return '';
}