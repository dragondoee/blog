<?php

if (isset($_SESSION["login"])) {
    echo "<h1>Bonjour {$_SESSION["login"]} </h1>";
    echo "<div class='profil'> <img class='pp profil-pp' src='img/profil/{$_SESSION["login"]}' alt='photo de profil de {$_SESSION["login"]}'>";
    echo "Login : {$user["login"]} <br> ";
    echo "<a class='button-style' href='index.php?action=form_pp'>Modifier sa photo</a> ";
    echo "</div>";

    ?>

    

    <?php

} else {
    echo "Vous devez vous connecter pour voir votre profil";
}



?>