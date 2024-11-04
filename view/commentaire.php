<!-- 

 Pour régler le probème des users :
 Mettre la boucle à l'exterieur, dans le contrôleur et appeler la fonction qui va bien
 Le formulaire : le mettre dans une autre vu et l'appeler avant la boucle

-->

<?php
if ($com) {
    if (isset($_SESSION["login"])) {
        ?>
        <br>
        <form method="POST">
            <label for="addCom">Commentaire</label>
            <textarea name="addCom" id="addCom" cols="100" rows="2"></textarea>
            <input type="submit">
        </form>
        <?php
    }
    if ($com) {
        foreach ($com as $commentaire) {
            ?>

            <span>
                <div class="liste-com">

                    <img class="pp" src="img/profil/<?= $commentaire["auteur"] ?>" alt="photo de profil de <?= $commentaire["auteur"] ?>">
                    <span class="content-com">
                        <span class="top-part-com">
                            <p><strong><?= $commentaire["auteur"] ?></strong></p>
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
                                    href='index.php?action=detail&com=true&supr=<?= $commentaire["id_com"] ?>&id_billet=<?= $billet["id_billet"] ?>'>
                                    <img src="img/delete.svg" alt="supprimer le commentaire" title="Supprimer le commentaire">
                                </a><br>
                                <a
                                    href='index.php?action=detail&com=true&modif=<?= $commentaire["id_com"] ?>&id_billet=<?= $billet["id_billet"] ?>'>
                                    <img src="img/edit.svg" alt="modifier le commentaire" title="Modifier le commentaire">
                                </a><br>
                            </span>
                            <?php
                        }
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