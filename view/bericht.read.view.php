<?php
// uit de controller ontvangen wij $bericht (alles uit de database)
require "parts/header.view.php";
require "parts/menu.view.php";
?>
    <!-- Bericht overzicht -->
    <div class="m-10">
        <p>Van: <?= $bericht['van'] ?></p>
        <p>Aan: <?= $bericht['aan'] ?></p>
        <p>Titel: <?= $bericht['titel'] ?></p>
        <p>Bericht: <?= $bericht['bericht'] ?></p>
    </div>

    <!-- Indien het bericht van de huidige gebruiker is id=2 (moet natuurlijk de ingelogde gebruikers_id zijn) -->
<?php if ($bericht['van_id'] == 2) { ?>
    <form action="/wijzig-bericht" method="post">
        <input type="hidden" name="id" value="<?= $bericht['id'] ?>">
        <input type="submit" name="wijzig" value="Wijzig" class="bg-indigo-600 text-white rounded px-2 py-1">
    </form>
<?php } ?>

    <!-- Navigatie -->
    <a href="/berichten" class="text-indigo-600 hover:text-indigo-800">Terug naar berichten</a>


<?php
require "parts/footer.view.php";
