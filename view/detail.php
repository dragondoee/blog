<div class="contenu">
    <span>
        <a href="index.php">Retour à l'accueil</a>
        <h1 id="content"><?= $result["titre"]; ?></h1>
        <!-- Images -->
        <img src="img/billet/<?= $result["img_billet"]; ?>" alt="">
    </span>

    <!-- Description -->
    <span class="description">
        <h2>Description : </h2>
        <p><?= $result["text"]; ?></p>

    </span>

    <?php
        echo "<h2>Commentaires : </h2>";
        if (isset($com)){
            
    
    if (empty($_GET["com"])) {
        ?>
        <a href="index.php?action=detail&com=true&id_billet=<?= $result["id_billet"]; ?>">Voir les commentaires</a>
        <?php
    } else {
        ?>
        <a href="index.php?action=detail&id_billet=<?= $result["id_billet"]; ?>">Masquer les commentaires</a>
        <?php
    }} else {
        echo "Aucun commentaire";
    }
    ;
    ?>


</div>