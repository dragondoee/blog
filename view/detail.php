<div class="contenu">

    <div>
        <h2 id="content"><?= $billet["titre"]; ?></h2>
        <p class="date">publié le <?= (new DateTime($billet["date"]))->format('d/m/Y \à H\hi'); ?></p>
    </div>
    <p class="description"><?= $billet["text"]; ?></p>

</div>
<h3 class="h3-com">Commentaires : </h3>