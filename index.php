<?php
//Hier kunnen we alles inladen wat we op elke pagina nodig hebben
session_start();

//configuratie bestand
$config = require "config.php";

//Onze veel gebruikte functies
require "functions.php";

require "Database.php";
require "models/Model.php";
require "models/User.php";
$user = new User();
//dd($user->first());
// Hier gaat de doorverwijzing naar andere pagina's
require "router.php";

