<a class="retour" href="index.php">retour</a>
<div class="contenu">
    <div>
        <h1 id="content"><?= $billet["titre"]; ?></h1>
        <p class="date">publié le <?= (new DateTime($billet["date"]))->format('d/m/Y \à H\hi'); ?></p>
    </div>
    <p class="description"><?= nl2br($billet["text"]); ?></p>

</div>
<h2 class="h2-com">Commentaires : </h2>