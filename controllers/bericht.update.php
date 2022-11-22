<?php
/*
 * LET OP! het is niet gebruikelijk om een bericht naar een ander te kunnen wijzigen. Zie dit alleen als wijzigingsvoorbeeld
 * */
$titel = "Wijzig bericht";

$db = new Database();

//indien er een wijziging binnenkomt
if (isset($_POST['verstuur']) and isset($_SESSION['bericht_id'])) {
    $error = false; //we gaan er vanuit dat er nog geen fouten zijn
    //validatie ...
    if (empty($_POST['titel'])) {
        $error = "Titel is een verplicht veld";
    }
    //.. nog meer validate

    if (!$error) { //wijziging doorvoeren
        $aantal = $db->query("UPDATE berichten SET titel=?, bericht=?, aan_id=? WHERE id=?", [
            $_POST['titel'],
            $_POST['bericht'],
            $_POST['aan_id'],
            $_SESSION['bericht_id'],
        ])->rowCount();

        if ($aantal == 0) {
            $error = "Wijzigen is mislukt";
        } else {
            $succes = "Bericht is gewijzigd";
        }
    }
}

//We gaan nu de gegevens ophalen die we bij onze view nodig hebben
if ((isset($_POST['id']) and isset($_POST['wijzig'])) or isset($_SESSION['bericht_id'])) {

    $bericht_id = $_POST['id'] ?? $_SESSION['bericht_id']; //als _POST['id'] niet bestaat nemen we _SESSION['bericht_id']

    //we zetten het in de sessie zodat we zeker weten dat alleen dit id wordt gewijzigd.
    $_SESSION['bericht_id'] = $bericht_id;

    //het bericht ophalen
    $bericht = $db->query("SELECT * FROM berichten where id=?", [$bericht_id])->fetch();

    //alle users ophalen (om te selecteren aan wie je het bericht stuurt)
    $users = $users = $db->query("SELECT * FROM users where deleted_at IS NULL")->fetchAll();

    require "view/bericht.update.view.php";
    die();//niet verder uitvoeren...
}

//error bericht of terug naar berichten als het goed is kom je hier nooit
redirect("/berichten");