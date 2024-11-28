<div class="contenu">
    <h1 id="content"><?= $billet["titre"]; ?></h1>
    <p>publié le <?= (new DateTime($billet["date"]))->format('d/m/Y \à H\hi'); ?></p>

    <!-- Description -->
    <span class="description">
        <h2>Description : </h2>
        <p><?= $billet["text"]; ?></p>

    </span>
    <h2>Commentaires : </h2>

</div>