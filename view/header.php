
<header class="composant-header">
    <a href="#content" class="skip-link">Aller au contenu</a>
    <nav>
        <a class="retourAccueil" href="index.php"><img src="img/logo-full.png" alt="retour à l'accueil"></a>
        <ul>
            <li><a href="index.php?action=archives">Archives</a></li>
            <?php
            if (isset($_SESSION["login"])) {
                if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") {
                    ?>
                    <li><a href="index.php?action=gestionUser">Liste Utilisateurs</a></li>
                    <?php
                } ?>
                <li><a href="index.php?action=profil">Profil</a></li>
                <li><a href="index.php?action=deconnexion">Se déconnecter</a></li>
                <?php
            } else {
                ?>
                <li><a href="index.php?action=login">Se connecter</a></li>
                <li><a href="index.php?action=inscription">S'inscrire</a></li>
                <?php
            }
            ?>


        </ul>
    </nav>
</header>