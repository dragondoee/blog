<span>
    <div class="liste-com">

        <img class="pp" src="img/profil/<?= $userCom ?>" alt="photo de profil de <?= $userCom ?>">
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
                        href='index.php?action=suprCom&supr=<?= $commentaire["id_com"] ?>'>
                        <img src="img/delete.svg" alt="supprimer le commentaire" title="Supprimer le commentaire">
                    </a><br>
                    <a
                        href='index.php?action=detail&modif=<?= $commentaire["id_com"] ?>'>
                        <img src="img/edit.svg" alt="modifier le commentaire" title="Modifier le commentaire">
                    </a><br>
                </span>
                <?php
            }
        }
        ?>

    </div>
</span>