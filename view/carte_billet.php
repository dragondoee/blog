<div class="salle" ?>
    <a href="index.php?action=detail&id_billet=<?= $billet["id_billet"]; ?>"><?= $billet["titre"]; ?></a>
    <p><?= $billet["date"]; ?></p>
    <?php
    if (isset($_SESSION["login"])) {
        if ($_SESSION["login"] == "admin") {
            echo "<a href='index.php?action=detail&id_billet={$billet["id_billet"]}&supr={$billet["id_billet"]}'> Supprimer </a><br>";
            echo "<a href='index.php?action=detail&id_billet={$billet["id_billet"]}&modif={$billet["id_billet"]}'> Modifier </a><br>";
        }
    }

    ?>
</div>