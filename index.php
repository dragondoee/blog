<!DOCTYPE html>
<html lang="fr">
<?php
require "model.php";
require "view/header.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Style -->
    <link rel="stylesheet" href="style-salle.css">
    <link rel="stylesheet" href="style-boisson.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_composant.css">
    <!--  -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Blog</title>
</head>

<body>

    <main>

        <?php

        if (isset($_GET["action"])) {
            $action = $_GET["action"];

            switch ($action) {
                // Archives
                case "archives":
                    $result = GetALLBillets();
                    require "view/archives.php";
                    break;
                // Login
                case "login":
                    if (isset($_POST["login"])) {
                        $msg = login($_POST);
                    }
                    require "view/login.php";
                    break;
                // Inscription
                case "inscription":
                    if (isset($_POST["login"])) {
                        $msg = inscription($_POST);
                    }
                    require "view/inscription.php";
                    break;
                // Detail
                case "detail":
                    $result = GetBillet($_GET["id_billet"]);
                    if (GetAllCommentairesBillet($result["id_billet"])) {
                        $com = GetAllCommentairesBillet($result["id_billet"]);

                    } else {
                        $com = NULL;
                    }
                    require "view/detail.php";
                    // Commentaires
                    if (isset($_GET["com"])) {
                        if ($_GET["com"] == "add") {
                            if (isset($_POST["objet"])) {
                                addCom($_POST, $result["id_billet"]);
                            }
                            require "view/form_com.php";
                        }
                        require "view/commentaire.php";
                    }
                    break;
                // Profil
                case "profil":
                    $user = getUser($_SESSION["login"]);
                    require "view/profil.php";
                    break;
                // deconnexion
                case "deconnexion":
                    deconnexion();
                    break;

            }
        } else {
            if (isset($_SESSION["login"])) {
                echo "Bonjour {$_SESSION["login"]}  <br><br>";

            }
            ?>
            <h1 id="content">Blog Emilie</h1>
            <span class="liste-salles">
                <?php


                if ($result = Get3Billets()) {
                    foreach ($result as $billet) {
                        require "view/carte_billet.php";
                    }
                    ;
                } else {
                    echo "Aucun résultat trouvé";
                }
                ?>
            </span>
            <a href="index.php?action=archives " class="button-style centerElem">Découvrir les autres billets</a>
            <?php
        }

        if (isset($_GET["gestion"])) {
            $gestion = $_GET["gestion"];

            switch ($gestion) {
                // User
                case "user":
                    if (isset($_GET["supr"])) {
                        // deleteUser($_GET["supr"]);
                    }
                    ;
                    $users = GetAllUsers();
                    require "view/gestionUser.php";
                    break;
                // Billet
                case "billet":
                    if (isset($_GET["supr"])) {
                        // deleteUser($_GET["supr"]);
                    }
                    ;
                    if (isset($_GET["modif"])) {
                        // deleteUser($_GET["supr"]);
                    }
                    ;
                    break;
                // Commentaire
                case "com":
                    if (isset($_GET["supr"])) {
                        // deleteUser($_GET["supr"]);
                    }
                    ;
                    if (isset($_GET["modif"])) {
                        // deleteUser($_GET["supr"]);
                    }
                    ;
                    break;
            }
        }
        ;

        ?>
    </main>

</body>

</html>


<!-- TODO

- Com : afficher les infos user
- Profil : ajout de photo

- Back office :
Commentaires
Publication

- CSS

supr billet
echo "<a href='index.php?action=gestion&gestion=billet&supr={$billet["id_billet"]}'> Supprimer </a><br>";

supr billet
echo "<a href='index.php?action=gestion&gestion=billet&supr={$billet["id_billet"]}'> Supprimer </a><br>";
-->