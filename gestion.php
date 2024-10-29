<!DOCTYPE html>
<html lang="fr">


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
    <title>BackOffice - Blog</title>
</head>

<body>


    <?php

    if (isset($_GET["gestion"])) {
        $gestion = $_GET["gestion"];

        switch ($gestion) {
            // User
            case "user":
                
                if(isset($_GET["supr"])){
                    deleteUser($_GET["supr"]);
                };
                $users=GetAllUsers();
                require "view/gestionUser.php";
                break;
            // Billet
            case "billet":
                if(isset($_GET["supr"])){
                    deleteBillet($_GET["supr"]);
                };
                $billets=GetALLBillets();
                require "view/gestionBillet.php";
                break;
            // Commentaire
            case "commentaire":
                $users=GetAllUsers();
                $coms=GetAllCommentaires();
                require "view/gestionCom.php";
                break;
        }
    } else {
        echo "<a href='index.php?action=gestion&gestion=user'>Gérer les utilisateurs</a> <br>";
        echo "<a href='index.php?action=gestion&gestion=billet'>Gérer les billets</a> <br>";
        echo "<a href='index.php?action=gestion&gestion=commentaire'>Gérer les commentaires</a>";

    }


    ?>


</body>

</html>