<?php
// uit de controller ontvangen wij $users (alle users uit de database behalve ons zelf)
require "parts/header.view.php";
require "parts/menu.view.php";
?>
    <!-- hier de pagina -->
    <h1 class="text-2xl font-bold sm:ml-4 mb-4">Maak bericht</h1>

    <!-- Indien er errors zijn dan ... -->
<?php if ($error ?? false) { ?>
    <div class="bg-red-600 rounded p-4 text-white"><?= $error ?></div>
<?php } ?>

    <!-- Formulier om een nieuwe bericht te schrijven -->
    <div class="ml-10">
        <!-- dit formulier kan je later opmaak geven, dit is bewust weggelaten om het zo eenvoudig mogelijk te maken -->
        <form action="/schrijf-bericht" method="post">
            Aan: <select name="aan_id">
                <?php foreach ($users as $user) { ?>
                    <option value="<?= $user['id'] ?>"><?= $user['voornaam'] ?> <?= $user['achternaam'] ?></option>
                <?php } ?>
            </select><br>
            <input type="text" name="titel" placeholder="titel"><br>
            <textarea name="bericht" cols="30" rows="10" placeholder="... hier je bericht ..."></textarea><br>
            <input type="submit" name="verstuur" value="verstuur" class="rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        </form>
    </div>

    <!-- Navigatie -->
    <a href="/berichten" class="text-indigo-600 hover:text-indigo-800">Terug naar berichten</a>
<?php
require "parts/footer.view.php";
