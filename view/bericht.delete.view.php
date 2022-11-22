<?php
// uit de controller ontvangen wij $bericht (alles uit de database)
require "parts/header.view.php";
require "parts/menu.view.php";
?>
    <!-- bevestiging vragen bij verwijderen -->
    <div>U staat op het punt om bericht '<?= $bericht['titel'] ?>' te verwijderen. Wilt u doorgaan?</div>

    <!-- verwijder knop -->
    <form action="/verwijder-bericht" method="post">
        <input type="hidden" name="id" value="<?= $bericht['id'] ?>">
        <input type="submit" value="Verwijder" name="verstuur" class="bg-red-600 text-white rounded px-2 py-1">
    </form>

    <!-- Navigatie -->
    <a href="/berichten" class="text-indigo-600 hover:text-indigo-800">Terug naar berichten</a>

<?php
require "parts/footer.view.php";