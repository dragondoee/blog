<?php

// TODO : Corriger: L'affichage n'a aucun sens mdrrr

if (isset($_SESSION["login"])) {
    echo "<h1>Bonjour {$_SESSION["login"]} </h1>";
    echo "Login : {$user["login"]} <br>";
    echo "<img class='pp' src='img/profil/{$_SESSION["login"]}' alt='photo de profil de {$_SESSION["login"]}'>";

    ?>

    <form method="POST" action="index.php?action=photoProfil" enctype="multipart/form-data">
        <label for="image">Image</label>
        <input type="file" name="image" id="image">

        <br>
        <br>
        <input type="submit">
    </form>

    <?php

} else {
    echo "Vous devez vous connecter pour voir votre profil";
}

echo "<br> <br><a href='index.php'>Retour à l'accueil</a>";

?>