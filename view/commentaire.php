<?php
if (empty($com)) {
    if (isset($_SESSION["login"])) {
        echo "Aucun commentaire, soyez le 1er";
    } else {
        echo "Aucun commentaire";
    }
} else {
    foreach ($com as $commentaire) {
        $userCom = getUserId($commentaire["auteur"])["login"];
        ?>

        <span>
            <div class="liste-com">

                <img class="pp" src="<?php
                echo file_exists("img/profil/{$userCom}.jpg")
                    ? "img/profil/{$userCom}.jpg"
                    : (file_exists("img/profil/{$userCom}.png")
                        ? "img/profil/{$userCom}.png"
                        : "img/profil/default.jpg"); ?>" alt="photo de profil de <?= htmlspecialchars($userCom) ?>">
                <span class="content-com">
                    <span class="top-part-com">
                        <p><strong><?= $userCom ?></strong></p>
                        <p class="date">Publié le <?= (new DateTime($commentaire["date"]))->format('d/m/Y \à H\hi'); ?></p>
                    </span>
                    <p><?= $commentaire["com"]; ?></p>
                </span>

                <?php
                if (isset($_SESSION["login"])) {
                    if ($_SESSION["login"] == "admin") {
                        ?>
                        <span class='admin-button-com'>
                            <a
                                href='index.php?action=suprCom&supr=<?= $commentaire["id_com"] ?>&id_billet=<?= $billet["id_billet"]; ?>'>
                                <img src="img/delete.svg" alt="supprimer le commentaire" title="Supprimer le commentaire">
                            </a><br>
                            <a
                                href='index.php?action=form_com&modif=<?= $commentaire["id_com"] ?>&id_billet=<?= $billet["id_billet"]; ?>'>
                                <img src="img/edit.svg" alt="modifier le commentaire" title="Modifier le commentaire">
                            </a><br>
                        </span>
                        <?php
                    }
                }
                ?>

            </div>
        </span>

        <?php
    }
}

?>