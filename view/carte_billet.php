<div class="salle" ?>
    <a href="index.php?action=detail&id_billet=<?= $billet["id_billet"]; ?>"><img src="img/billet/<?= $billet["img_billet"]; ?>"
            alt="lien vers les détails du billet <?= $billet["titre"]; ?> "></a>
    <a href="index.php?action=detail&id_billet=<?= $billet["titre"]; ?>"><?= $billet["titre"]; ?></a>
    <p><?= $billet["date"]; ?></p>
    <?php
    if ($_SESSION["login"]=="admin") {
        echo "<a href='index.php?action=gestion&gestion=billet&supr={$billet["id_billet"]}'> Supprimer </a><br>";
        echo "<a href='index.php?action=gestion&gestion=billet&modif={$billet["id_billet"]}'> Modifier </a><br>";
    }
    ?>
</div>