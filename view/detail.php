<div class="contenu">
    <h1 id="content"><?= $billet["titre"]; ?></h1>

    <!-- Description -->
    <span class="description">
        <h2>Description : </h2>
        <p><?= $billet["text"]; ?></p>

    </span>

    <?php
    echo "<h2>Commentaires : </h2>";
    if (isset($com)) {


        if (empty($_GET["com"])) {
            ?>
            <a href="index.php?action=detail&com=true&id_billet=<?= $billet["id_billet"]; ?>">Voir les commentaires</a>
            <?php
        } else {
            ?>
            <a href="index.php?action=detail&id_billet=<?= $billet["id_billet"]; ?>">Masquer les commentaires</a>
            <?php
        }
    } else {
        echo "Aucun commentaire";
    }
    ;
    ?>


</div>