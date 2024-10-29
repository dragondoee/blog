<?php
foreach ($users as $user) {

    echo "{$user["login"]}";
    if ($user["login"] != "admin") {
        echo "<a href='index.php?action=gestionUser&gestion=user&supr={$user["login"]}'> Supprimer </a><br>";

    } else {
        echo "<br>";
    }
}