<?php
// uit de controller ontvangen wij $users (alle users uit de database behalve ons zelf)
require "parts/header.view.php";
require "parts/menu.view.php";
?>

    <h1 class="text-2xl font-bold sm:ml-4 mb-4">Maak bericht</h1>

    <!-- indien er errors of successen zijn dan ... -->
<?php if ($error ?? false) { ?>
    <div class="bg-red-600 rounded p-4 text-white"><?= $error ?></div>
<?php } ?>
<?php if ($succes ?? false) { ?>
    <div class="bg-green-600 rounded p-4 text-white"><?= $succes ?></div>
<?php } ?>

    <!-- update formulier -->
    <div class="ml-10">
        <!-- dit formulier kan je later opmaak geven, dit is bewust weggelaten om het zo eenvoudig mogelijk te maken -->
        <form action="/wijzig-bericht" method="post">
            Aan: <select name="aan_id">
                <?php foreach ($users as $user) { ?>
                    <option value="<?= $user['id'] ?>" <?= ($user['id'] == $bericht['aan_id']) ? 'selected' : '' ?> ><?= $user['voornaam'] ?> <?= $user['achternaam'] ?></option>
                <?php } ?>
            </select><br>
            <input type="text" name="titel" placeholder="titel" value="<?= $bericht['titel'] ?>"><br>
            <textarea name="bericht" cols="30" rows="10" placeholder="... hier je bericht ..."><?= $bericht['bericht'] ?></textarea><br>
            <input type="submit" name="verstuur" value="wijzig" class="rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        </form>
    </div>
    <!-- Navigatie -->
    <a href="/berichten" class="text-indigo-600 hover:text-indigo-800">Terug naar berichten</a>
    <a href="/lees-bericht?id=<?= $bericht['id'] ?>" class="text-indigo-600 hover:text-indigo-800">Bekijk bericht</a>

<?php
require "parts/footer.view.php";