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

            <span class="liste-boissons">
                <div>
                    <span>
                        <img src="img/profil/<?= $_SESSION["login"] ?>" alt="photo de profil de <?=$_SESSION["login"]?>">
                        <p><strong><?= $_SESSION["login"] ?></strong></p>
                    </span>
                    <span>
                        <p><?= $commentaire["com"]; ?></p>
                    </span>
                    <p><strong><?= $commentaire["date"]; ?></strong></p>
                    <?php
                    if (isset($_SESSION["login"])) {
                    if ($_SESSION["login"] == "admin") {
                        echo "<a href='index.php?action=detail&com=true&supr={$commentaire["id_com"]}&id_billet={$billet["id_billet"]}'> Supprimer </a><br>";
                        echo "<a href='index.php?action=detail&com=true&modif={$commentaire["id_com"]}&id_billet={$billet["id_billet"]}'> Modifier </a><br>";
                    }}
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