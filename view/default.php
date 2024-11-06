<!-- Vu par défault / Page accueil -->
<?php
if (isset($_SESSION["login"])) {
    echo "Bonjour {$_SESSION["login"]}  <br><br>";
    if ($_SESSION["login"] == "admin") {
        ?>
        <a href='index.php?action=form_billet'>
            <img src="img/add.svg" alt="Ajouter un billet">
        </a>
        <?php
    }

}

?>
<h1 id="content">Blog Emilie</h1>
<span class="liste-billet">
    <?php


    if (isset($result)) {
        foreach ($result as $billet) {
            require "view/carte_billet.php";
        }
        ;
    } else {
        echo "Aucun résultat trouvé";
    }
    ?>
</span>
<a href="index.php?action=archives " class="button-style centerElem">Découvrir les autres billets</a>