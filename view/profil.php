<?php

// TODO : Corriger: L'affichage n'a aucun sens mdrrr

if (isset($_SESSION["login"])) {
    echo "<h1>Bonjour {$_SESSION["login"]} </h1>";
    echo "Login : {$user["login"]} <br>";

    ?>

    <form action="ajout_photo.php">
        <label for="photo">Photo</label>
        <input type="file" name="photo" id="photo">

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