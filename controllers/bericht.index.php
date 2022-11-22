<?php
$titel = "Inbox";

$db = new Database();

//haal alle berichten op van de huidige gebruiker
$user_id = 2; //dit moet het id van de ingelogde gebruiker zijn nu even van gebruiker id=2

//alle berichten ophalen van de huidige gebruiker
$berichten = $db->query("SELECT b.*, u.email as van FROM berichten b,users u WHERE b.aan_id = ? and b.van_id = u.id", [$user_id])->fetchAll();

require "view/bericht.index.view.php";