<?php
require "parts/header.view.php";
require "parts/menu.view.php";
?>
    <!-- hier de about pagina -->
    <h1 class="text-2xl font-bold sm:ml-4 mb-4">Contact</h1>

    <div class="border-t border-b border-gray-200 p-2  sm:ml-6 mt-20">
        <dt class="font-medium text-gray-900"><?= config('app.name') ?></dt>
        <dd class="mt-2 text-sm text-gray-500">
            <?= $contactgegevens['plaats'] ?><br>
            <?= $contactgegevens['adres'] ?><br><br>
            Tel: <?= config('app.telefoonnr') ?>
        </dd>
    </div>

<?php
require "parts/footer.view.php";
