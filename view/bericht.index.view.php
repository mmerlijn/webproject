<?php
// uit de controller ontvangen wij $users (alle users uit de database behalve ons zelf)
require "parts/header.view.php";
require "parts/menu.view.php";
?>
    <!-- hier de pagina -->
    <h1 class="text-2xl font-bold sm:ml-4 mb-4">Inbox</h1>

    <!-- Navigatie -->
    <a href="/schrijf-bericht" class="text-indigo-600 hover:text-indigo-800">Nieuw bericht</a>

    <!-- tabel met alle berichten die een gebruiker heeft ontvangen -->
    <div class="m-10">
        <table class="w-1/2">
            <tr>
                <td class="font-bold">Datum</td>
                <td class="font-bold">Van</td>
                <td class="font-bold">Titel</td>
                <td class="font-bold">Lees</td>
                <td class="font-bold">Verwijder</td>
            </tr>
            <!-- Loop door alle berichten -->
            <?php foreach ($berichten as $bericht) { ?>
                <tr class="cursor:pointer hover:bg-blue-100">
                    <td><?= $bericht['created_at'] ?></td>
                    <td><?= $bericht['van'] ?></td>
                    <td><?= $bericht['titel'] ?></td>
                    <td><a href="lees-bericht?id=<?= $bericht['id'] ?>" class="text-indigo-600 hover:text-indigo-800">Lees</a>
                    </td>
                    <td>
                        <a href="verwijder-bericht?id=<?= $bericht['id'] ?>" class="text-indigo-600 hover:text-indigo-800">Verwijder</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

<?php
require "parts/footer.view.php";