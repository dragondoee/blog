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

// TODO : A revoir
function deconnexion()
{
    session_destroy();
    // ! Utilisation du header
    header("location: index.php");
}
;



// ! Commentaire

function GetCom($id_com)
{
    global $db;
    $requete = "SELECT * FROM commentaire WHERE id_com=:id_com";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':id_com', $id_com, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
;

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

function insertCommentaire( $com, $id_billet)
{
    global $db;
    $requete = "INSERT INTO commentaire (auteur, com, billet) VALUES (:auteur, :com, :billet);";
    $stmt = $db->prepare($requete);
    $user = getUser($_SESSION["login"]);
    $stmt->bindParam(':auteur', $user["id_user"], PDO::PARAM_INT);
    $stmt->bindParam(':com', $com, PDO::PARAM_STR);
    $stmt->bindParam(':billet', $id_billet, PDO::PARAM_INT);
    $stmt->execute();
}
;


function deleteCommentaire($id_com)
{
    global $db;
    $requete = "DELETE FROM commentaire WHERE id_com=:id_com";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':id_com', $id_com, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
;

// TODO
function updateCommentaire($com,$id_com)
{
    global $db;
    $requete = "UPDATE commentaire SET com=:com WHERE id_com=:id_com";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':id_com', $id_com, PDO::PARAM_INT);
    $stmt->bindParam(':com', $com, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
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
    $requete = "SELECT * FROM billet ORDER BY date DESC LIMIT 3";
    $stmt = $db->query($requete);
    return $result = $stmt->fetchall(PDO::FETCH_ASSOC);
}
;

function GetALLBillets()
{
    global $db;
    $requete = "SELECT * FROM billet "  ;
    $stmt = $db->query($requete);
    return $result = $stmt->fetchall(PDO::FETCH_ASSOC);
}
;

function insertBillet($titre,$text)
{
    global $db;
    $requete = "INSERT INTO billet(titre,text) VALUES (:titre, :text);";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
    $stmt->bindParam(':text', $text, PDO::PARAM_STR);
    $stmt->execute();
}
;


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

function updateBillet($titre,$texte,$id_billet)
{
    global $db;
    $requete = "UPDATE billet SET titre = :titre , text=:text WHERE id_billet=:id_billet";
    $stmt = $db->prepare($requete);
    $stmt->bindParam(':id_billet', $id_billet, PDO::PARAM_INT);
    $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
    $stmt->bindParam(':text', $texte, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
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



function addphoto()// ajouter une photo de profil
{

}
;

function updatephoto()// mettre à jour sa photo de profil
{

}
;




