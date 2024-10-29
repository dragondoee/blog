<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=blog', 'root', '');



//! Utilisateur

function getUser($login)
{
    global $db;
    $requete = "SELECT * FROM user WHERE login=:login";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
;
function getUserId($id)
{
    global $db;
    $requete = "SELECT * FROM user WHERE id_user=:id";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
;

function GetAllUsers()
{
    global $db;
    $requete = "SELECT * FROM user";
    $stmt = $db->query($requete);
    return $result = $stmt->fetchall(PDO::FETCH_ASSOC);
}
;

function insertUser($login, $mdp)
{
    global $db;
    $requete = "INSERT INTO user VALUES (NULL, NULL, :login, :mdp);";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
    $stmt->bindParam(':mdp', $mdp_hash, PDO::PARAM_STR);
    $stmt->execute();
}
;

function deleteUser($login)
{
    global $db;
    $requete = "DELETE FROM user WHERE login=:login";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
;

function deconnexion()
{
    session_start();
    session_destroy();
    header("location: index.php");
    // ! Utilisation du header
}
;



// ! Commentaire


function GetAllCommentaires()
{
    global $db;
    $requete = "SELECT * FROM commentaire";
    $stmt = $db->query($requete);
    return $result = $stmt->fetchall(PDO::FETCH_ASSOC);
}
;

function GetAllCommentairesBillet($id_billet)
{
    global $db;
    $requete = "SELECT * FROM commentaire WHERE billet=:billet";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':billet', $id_billet, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
;

function insertCommentaire($objet,$auteur, $com, $id_billet)
{
    global $db;
    $requete = "INSERT INTO commentaire VALUES (NULL, :objet, :auteur, :date ,:com, :billet);";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':objet', $objet, PDO::PARAM_STR);
    $stmt->bindParam(':auteur', $auteur, PDO::PARAM_STR);
    $dateSc = time();
    $date = date( "Y-m-d H:i:s", $dateSc );
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':com', $com, PDO::PARAM_STR);
    $stmt->bindParam(':billet', $id_billet, PDO::PARAM_STR);
    $stmt->execute();
}
;

function deleteCommentaire()
{
}
;

function updateCommentaire()
{

}
;


// ! Billet

function GetBillet($id_billet)
{
    global $db;
    $requete = "SELECT * FROM billet WHERE id_billet=:id_billet";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':id_billet', $id_billet, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
;
function Get3Billets()
{
    global $db;
    $requete = "SELECT * FROM billet LIMIT 3";
    $stmt = $db->query($requete);
    return $result = $stmt->fetchall(PDO::FETCH_ASSOC);
}
;

function GetALLBillets()
{
    global $db;
    $requete = "SELECT * FROM billet";
    $stmt = $db->query($requete);
    return $result = $stmt->fetchall(PDO::FETCH_ASSOC);
}
;

// TODO : A tester
function insertBillet($titre, $date, $text, $img)
{
    global $db;
    $requete = "INSERT INTO billet VALUES (NULL, :titre, :date, :text, :img);";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':text', $text, PDO::PARAM_STR);
    $stmt->bindParam(':img', $img, PDO::PARAM_STR);
    $stmt->execute();
}
;

// TODO : A tester
function deleteBillet($id_billet)
{
    global $db;
    $requete = "DELETE FROM billet WHERE id_billet=:id_billet";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':id_billet', $id_billet, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
;

function updateBillet()
{

}
;



// ! Traitement

// TODO : header location
function login($infoLogin)
{
    if ($user = getUser($infoLogin["login"])) {
        if (password_verify($infoLogin["mdp"], $user["mdp"])) {
            $_SESSION["login"] = $infoLogin["login"];
            if ($user["role"] == "admin") {
                $_SESSION["role"] = "admin";
            }
            ;
            // Revenir à la page d'accueil
            header("location: index.php");
            // return "connexion";
            // ! Utilisation du header
        } else {
            return "err-mdp";
        }
        ;
    } else {
        return "err-login";
    }
    ;
}
;

function inscription($infoLogin)
{
    if (empty(getUser($infoLogin["login"]))) {

        if ($infoLogin["mdp"] == $infoLogin["conf"]) {

            insertUser($infoLogin["login"], $infoLogin["mdp"]);

            // echo "<br> Vous êtes inscrit";
            // echo "<a href='login.php'>Vous connectez</a>";
            login($infoLogin);

        } else {
            return "err-mdp";
        }

    } else {
        return "err-login";
    }
}
;

function addCom($infoCom, $id_billet)// ajouter un commentaire
{
    $user = getUser($_SESSION["login"]);
    insertCommentaire($infoCom["objet"], $user["id_user"], $infoCom["com"], $id_billet);
}
;

function addBillet()// ajouter un billet
{

}
;

function addphoto()// ajouter une photo de profil
{

}
;

function updatephoto()// mettre à jour sa photo de profil
{

}
;







// ! Indication / aide 


// Il faut utiliser des case / Switch
// Action = Login -> Action c'est afficher le formulaire
// Le fichier index est le contrôleur ( 2 pages à faire sans le back office)
// 1 page pour saisir le GetBillet(2 vue utilisateur)
// Tous les boutons renvois sur la page index mais avec une action

// On peut géré l'admin on considérant que c'est l'ID 1

// form method post 
// action en get et le reste en post pour pas mélanger les INFO_CREDITS
// insertUser array du Post
// $_post ==> Récupère en tableau toute les infos