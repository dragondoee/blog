
<?php
// 
if (isset($commentaire)) {
    ?>

    <form method="POST" action="index.php?action=ModifCom&id_billet=<?= $billet["id_billet"]; ?>&modif=<?= $commentaire["id_com"] ?>">
        <div>
            <label for="addCom">Commentaire</label>
            <textarea name="addCom" id="addCom" cols="100" rows="2"> <?= $commentaire["com"] ?> </textarea>
            <input type="submit">
    </form>

    <?php
} else {
    ?>
    <form class="form_com" method="POST" action="index.php?action=addCom&id_billet=<?= $billet["id_billet"]; ?>">
        <!-- <label for="addCom">Commentaire</label> -->
        <textarea name="addCom" id="addCom" placeholder="Ajoutez un commentaire"></textarea>
        <input type="submit">
    </form>
    <?php
}
?>