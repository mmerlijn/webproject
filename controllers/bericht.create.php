<?php
$titel = "Schrijf een bericht";
//we maken een database object
$db = new Database();

// Normaal gesproken is een gebruiker ingelogd en weten we zijn of haar gebruiker 'id'
// we gaan er nu vanuit dat de ingelogde gebruiker id=2 heeft

//bij een post dan bericht invoeren in de database
if (isset($_POST['verstuur'])) {
    //insert query
    $aantal = $db->query("INSERT INTO berichten (titel,bericht,aan_id,van_id) VALUES (?,?,?,?)", [
        $_POST['titel'],
        $_POST['bericht'],
        $_POST['aan_id'],
        2 //huidige gebruiker
    ])->rowCount();

    if ($aantal == 1) { //bericht is toegevoegd
        $bericht_id = $db->lastInsertId();
        redirect("/lees-bericht?id=$bericht_id"); //doorverwijzen naar lees bericht

    } else {
        $error = "Er is iets foutgegaan met het aanmaken van het bericht";
    }
}


//We halen alle users op
$users = $db->query("SELECT * FROM users where id <> ? AND deleted_at IS NULL", [2])->fetchAll();

//we gebruiken deze gegevens in onze view
require "view/bericht.create.view.php";