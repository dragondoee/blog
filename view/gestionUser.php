<?php
foreach ($users as $user) {
    echo "<img class='pp' src='img/profil/{$user["login"]}' alt='photo de profil de {$user["login"]}'>";
    echo "{$user["login"]}";
    if ($user["login"] != "admin") {
        echo "<a href='index.php?action=gestionUser&gestion=user&supr={$user["login"]}'> Supprimer </a><br>";

    } else {
        echo "<br>";
    }
}