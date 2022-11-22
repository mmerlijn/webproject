<?php
$titel = "Lees een bericht";

if (isset($_GET['id'])) {
    //leest en typt makkelijker
    $bericht_id = $_GET['id'];

    //database object aanmaken
    $db = new Database();

    //query op database waarbij we het bericht en de van en aan user ophalen
    $bericht = $db->query("SELECT berichten.*, u1.email as aan, u2.email as van FROM berichten,users u1, users u2 WHERE berichten.id=? AND berichten.aan_id = u1.id and berichten.van_id = u2.id",
        [$bericht_id])->fetch();
    require "view/bericht.read.view.php";
    die(); //klaar
}

//in elke andere situatie ...
//verwijs naar een pagina dat het bericht niet kan worden geopend of een lijst met alle berichten...
redirect("/berichten");
