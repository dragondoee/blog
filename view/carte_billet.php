<div class="billet">
    <div>
    <span>
        <h2><?= $billet["titre"]; ?></h2>
        <p>publié le <?= (new DateTime($billet["date"]))->format('d/m/Y \à H\hi'); ?></p>
        <p><?= mb_strlen($billet["text"], 'UTF-8') > 100 ? mb_substr($billet["text"], 0, 100, 'UTF-8') . "..." : $billet["text"];
        ?></p>
    </span>
    
    <?php
    if (isset($_SESSION["login"])) {
        if ($_SESSION["login"] == "admin") {
            ?>
            <span class="admin-button-billet">
                <a href='index.php?action=detail&id_billet=<?= $billet["id_billet"] ?>&supr=<?= $billet["id_billet"] ?>'>
                    <img src="img/delete.svg" alt="supprimer le billet" title="Supprimer le billet">
                </a><br>
                <a href='index.php?action=detail&id_billet=<?= $billet["id_billet"] ?>&modif=<?= $billet["id_billet"] ?>'>
                    <img src="img/edit_note.svg" alt="modifier le billet" title="Modifier le billet">
                </a><br>
            </span>

            <?php
        }
    }

    ?>
    </div>
    <br>
    <a class="button-style small-button centerElem"
    href="index.php?action=detail&id_billet=<?= $billet["id_billet"]; ?>">Lire plus</a>
</div>