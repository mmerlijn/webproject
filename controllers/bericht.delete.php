<?php
$titel = "Verwijder bericht";

$db = new Database();

//er is een verwijder verzoek gedaan
if (isset($_POST['verstuur'])) {
    $bericht_id = $_POST['id'];
    //bericht verwijderen
    $db->query("DELETE FROM berichten WHERE id=?", [$bericht_id]);

    //na verwijderen terug naar index pagina
    redirect("/berichten");
}

//het bericht wat verwijderd moet worden wordt meegestuurd
if (isset($_GET['id'])) {
    $bericht_id = $_GET['id'];
    $bericht = $db->query("SELECT * FROM berichten WHERE id=?", [$bericht_id])->fetch();
}
//in de view vragen we om bevestiging
require "view/bericht.delete.view.php";