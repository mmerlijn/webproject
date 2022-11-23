<?php
//Hier kunnen we alles inladen wat we op elke pagina nodig hebben
session_start();

//configuratie bestand
$config = require "config.php";

//Onze veel gebruikte functies
require "functions.php";

require "Database.php";

require "router.php";

