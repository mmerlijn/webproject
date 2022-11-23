<?php

//controlle op aanwezigheid van email en wachtwoord
if (!(isset($_POST['email']) and isset($_POST['password']))) {
    //dit is geen inlog poging dus het normale inlog formulier tonen
    require "view/login.view.php";
    die();

} else {
    //email ingevuld?
    if (empty($_POST['email'])) {
        $error = "Email mag niet leeg zijn";
        require "view/login.view.php";
        die();
    }
    //wachtwoord ingevuld???
    if (empty($_POST['password'])) {
        $error = "Wachtwoord mag niet leeg zijn";
        require "view/login.view.php";
        die();
    }
}
//selecteren van de gebruiker in de database adh van email
$db = new Database();
$user = $db->query("SELECT * FROM users WHERE email=?", [$_POST['email']])->fetch();

// bestaat deze gebruiker?
if (!$user) {
    $error = "Gebruiker bestaat niet";
    require "view/login.view.php";
    die();
}
//controleren of wachtwoord juist is
if (!password_verify($_POST['password'], $user['password'])) {
    $error = "Onjuist wachtwoord";
    require "view/login.view.php";
    die();
}
//gebruiker in session zetten, maar het wachtwoord laten we weg
unset($user['password']);
$_SESSION['user'] = $user;

//doorverwijzen waar we de ingelogde gebruiker naar toe willen laten gaan
redirect("/home");
