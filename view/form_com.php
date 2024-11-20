
<?php
// 
if (isset($commentaire)) {
    ?>

    <form method="POST" action="index.php?action=ModifCom">
        <div>
            <label for="addCom">Commentaire</label>
            <textarea name="addCom" id="addCom" cols="100" rows="2"> <?= $commentaire["com"] ?> </textarea>
            <input type="hidden" name="id_com" value="<?= $billet["id_billet"] ?>">
            <input type="submit">
    </form>

    <?php
} else {
    ?>
    <form method="POST" action="index.php?action=AddCom">
        <label for="addCom">Commentaire</label>
        <textarea name="addCom" id="addCom" cols="100" rows="2"></textarea>
        <input type="submit">
    </form>
    <?php
}
?>