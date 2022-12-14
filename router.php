<?php
//ROUTER
// Hier doen we een controle of een bepaalde URL bestaat en we verwijzen door naar een controller of een view

//Uitlezen van de huidige URL
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//Als de uri voldoet aan de volgende voorwaarde dan ...
switch ($uri) {
    case "/":
    case "/home": //als de url /home bevat dan
        require "controllers/home.php";
        break;

    case "/about":
        require "controllers/about.php";
        break;

    case "/contact":
        require "controllers/contact.php";
        break;
    //berichten
    case "/berichten":
        require "controllers/bericht.index.php";
        break;
    case "/lees-bericht":
        require "controllers/bericht.read.php";
        break;
    case "/schrijf-bericht":
        require "controllers/bericht.create.php";
        break;
    case "/wijzig-bericht":
        require "controllers/bericht.update.php";
        break;
    case "/verwijder-bericht":
        require "controllers/bericht.delete.php";
        break;
    case "/login":
        require "controllers/login.php";
        break;
    default: //niet bekende uri dan ...
        http_response_code(404);
        require "view/404.view.php";
}