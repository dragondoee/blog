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
                    if (isset($_GET["supr"])) {
                        deleteBillet($_GET["supr"]);
                    }
                    if (isset($_GET["modif"])) {
                        if(isset($_POST["texteBillet"])){
                           updateBillet();
                        }
                        require "view/form_billet.php";
                    }
                    $billet = GetBillet($_GET["id_billet"]);
                    if (GetAllCommentairesBillet($billet["id_billet"])) {
                        $com = GetAllCommentairesBillet($billet["id_billet"]);

                    } else {
                        $com = NULL;
                    }
                    if (!isset($_GET["modif"])) {
                        require "view/detail.php";

                    }
                    // Commentaires
                    if (isset($_GET["com"])) {
                        if (isset($_POST["addCom"])) {
                            // ! Ajout à l'infini
                            addCom($_POST, $billet["id_billet"]);
                            $_POST = array();
                        }
                        if (isset($_GET["supr"])) {
                            deleteCommentaire($_GET["supr"]);
                        }
                        if (isset($_GET["modif"])) {

                        }
                        $users=GetAllUsers();
                        $com = GetAllCommentairesBillet($billet["id_billet"]);
                        require "view/commentaire.php";
                    }
                    break;
                // Profil
                case "profil":
                    $user = getUser($_SESSION["login"]);
                    require "view/profil.php";
                    break;
                // Gestion utilisateur
                case "gestionUser":
                    if (isset($_GET["supr"])) {
                        deleteUser($_GET["supr"]);
                    }
                    ;
                    $users = GetAllUsers();
                    require "view/gestionUser.php";
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


        ?>
    </main>

</body>

</html>


<!-- TODO

- Com : afficher les infos user 
- Profil : ajout de photo

- Back office :
Commentaires : modifier
Publication : Ajouter, Modifier

- CSS

-->