<?php
require "parts/header.view.php";
require "parts/menu.view.php";

?>
    <h1 class="m-10 text-3xl font-bold">Welkom op onze website</h1>

<?php if (isLogin()): ?>
    Je bent ingelogd als <?= username() ?>
<?php else: ?>
    <a href="/login" class="text-indigo-600 hover:text-indigo-800">Inloggen</a>
<?php endif ?>


<?php
require "parts/footer.view.php";
