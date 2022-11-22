<?php
//hier komt je menu, ontwerp zelf wat of leen wat code van andere pagina's bv van https://tailwindui.com/components/preview

?>
<nav>
    <div class="flex gap-8 bg-blue-50 p-2">
        <div class="flex">
            <!-- Logo van je website -->
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="bedrijfslogo">
            <span class="ml-4 font-medium"><?= $config['app']['name'] ?></span>
        </div>
        <div>
            <a href="/" class="hover:text-indigo-700 <?= isUri("/") ? 'bg-purple-200 rounded p-2' : '' ?>">Home</a>
        </div>
        <div>
            <a href="/about" class="hover:text-indigo-700  <?= isUri("/about") ? 'bg-purple-200 rounded p-2' : '' ?>">About</a>
        </div>
        <div>
            <a href="/contact" class="hover:text-indigo-700 <?= isUri("/contact") ? 'bg-purple-200 rounded p-2' : '' ?>">Contact</a>
        </div>
        <div>
            <a href="/berichten" class="hover:text-indigo-700 <?= isUri("/berichten") ? 'bg-purple-200 rounded p-2' : '' ?>">Berichten</a>
        </div>
    </div>
</nav>
