
<?php
if(isset($billet)){
?>

<form method="POST" action="index.php?action=ModifBillet">
    <div>
        <label for="titre" >Titre</label>
        <input type="titre" id="titre" name="titre" require value="<?= $billet["titre"] ?>">
    </div>
    <div>
        <label for="texte">Texte</label>
        <textarea name="texteBillet" id="texte" cols="100" rows="7" require><?= $billet["text"] ?></textarea>
    </div>
    <div><input type="hidden" name="id_billet" value="<?= $billet["id_billet"] ?>"></div>
    <div><input type="submit"></div>
</form>

<?php
} else {
    ?>
    <form method="POST" action="index.php?action=Billet">
    <div>
        <label for="titre">Titre</label>
        <input type="titre" id="titre" name="titre" require>
    </div>
    <div>
        <label for="texte">Texte</label>
        <textarea name="texteBillet" id="texte" cols="100" rows="10" require></textarea>
    </div>
    <div><input type="submit"></div>
</form>
<?php
}
?>