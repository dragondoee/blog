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
    <link rel="stylesheet" href="style.css">
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
                // Formulaire billet
                case "form_billet":
                    if (isset($_GET["modif"])) {
                        $id_billet = $_GET["modif"];
                        $billet = GetBillet($id_billet);
                    }
                    require "view/form_billet.php";
                    break;
                // Ajouter un billet
                case "addBillet":
                    if (isset($_POST["texteBillet"])) {
                        insertBillet($_POST["titre"], $_POST["texteBillet"]);
                        $result = Get3Billets();
                        require "view/default.php";
                    }
                    break;
                // Modifier un billet
                case "ModifBillet":
                    if (isset($_POST["texteBillet"])) {
                        updateBillet($_POST["titre"], $_POST["texteBillet"], $_POST["id_billet"]);
                        $result = Get3Billets();
                        require "view/default.php";
                    }
                    break;
                // supr_billet
                case "suprBillet":
                    if (isset($_GET["supr"])) {
                        deleteBillet($_GET["supr"]);
                        $result = Get3Billets();
                        require "view/default.php";
                    }
                    break;
                // Detail
                case "detail":
                    $billet = GetBillet($_GET["id_billet"]);
                    if (GetAllCommentairesBillet($billet["id_billet"])) {
                        $com = GetAllCommentairesBillet($billet["id_billet"]);

                    } else {
                        $com = NULL;
                    }
                    require "view/detail.php";
                    require "view/form_com.php";

                    // Commentaires
                        $com = GetAllCommentairesBillet($billet["id_billet"]);
                    if(isset($com)){
                        foreach ($com as $commentaire) {
                            $userCom = getUserId($commentaire["auteur"])["login"];
                            require "view/commentaire.php";
                        }
                    } else{
                        if (isset($_SESSION["login"])) {
                            echo "Aucun commentaire, soyez le 1er";
                        } else {
                            echo "Aucun commentaire";
                        }
                    }
                    ;
                    ;
                    break;
                // Ajouter un billet
                case "addCom":
                    if (isset($_POST["addcom"])) {
                        insertCommentaire($_POST["addcom"], $_POST["id_billet"]);
                        $billet = GetBillet($_GET["supr"]);
                        require "view/detail.php";
                    }
                    break;
                // Modifier un billet
                case "ModifCom":
                    if (isset($_POST["addcom"])) {
                        // updateCommentaire($_POST["addcom"], $_POST["id_billet"]);
                        $billet = GetBillet($_GET["supr"]);
                        require "view/detail.php";
                    }
                    break;
                // supr_billet
                case "suprCom":
                    if (isset($_GET["supr"])) {
                        deleteCommentaire($_GET["supr"]);
                        $billet = GetBillet($_GET["supr"]);
                        require "view/detail.php";
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
            $result = Get3Billets();
            require "view/default.php";
        }


        ?>
    </main>

</body>

</html>


<!-- TODO

- Back office :
Commentaires : modifier, ajouter sur nouvelle publication

- Profil : ajout de photo

-Notification d'action ( suprimer, ajouter, modifer)

- CSS

-->