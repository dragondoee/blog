
    <form method="POST">


        <label for="login">Login</label>
        <input type="text" name="login" id="login">
        <?php if (isset($msg) && $msg=="err-login") {
            echo "Le login est déjà pris";
        } ?>
        <br>

        <label for="mdp">Mot de passe</label>
        <input type="text" name="mdp" id="mdp">
        <br>

        <label for="conf">Confirmer le mot de passe</label>
        <input type="text" name="conf" id="conf">
        <?php if (isset($msg) && $msg=="err-mdp") {
            echo "Les mots de passe ne sont pas identiques";
        } ?>
        <br>
        <br>

        <input type="submit" name="" id="">




    </form>

    <a href="index.php?action=login">Vous avez déjà un compte ? Connectez-vous</a>
