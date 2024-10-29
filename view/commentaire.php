<?php
if ($com) {
    if (isset($_SESSION["login"]) && $_GET["com"] != "add") {
        ?>
        <a href="index.php?action=detail&com=add&id_billet=<?= $result["id_billet"]; ?>">Ajouter un commentaire</a>
        <?php
    }
    if (isset($_SESSION["login"]) && $_GET["com"] == "add") {
        ?>
        <a href="index.php?action=detail&com=true&id_billet=<?= $result["id_billet"]; ?>">Annuler</a>
        <?php
    }
    ;
    if ($com) {
        foreach ($com as $commentaire) {
            ?>

            <span class="liste-boissons">
                <div>
                    <span>
                        <!-- <img src="profil_<?= $user["id_user"]; ?>" alt="photo de profil"> -->
                        <!-- <p><strong><?= $user["login"]; ?></strong></p> -->
                    </span>
                    <span>
                        <h2><?= $commentaire["objet"]; ?></h2>
                        <p><?= $commentaire["com"]; ?></p>
                    </span>
                    <p><strong><?= $commentaire["date"]; ?></strong></p>
                    <?php
                    if ($_SESSION["login"] == "admin") {
                        echo "<a href='index.php?action=detail&gestion=com&supr={$commentaire["id_com"]}'> Supprimer </a><br>";
                        echo "<a href='index.php?action=detail&gestion=com&modif={$commentaire["id_com"]}'> Modifier </a><br>";
                    }
                    ?>
                </div>

                <?php
        }
        ?>

        </span>

        <?php
    }
}
;
?>