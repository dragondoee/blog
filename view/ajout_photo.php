<?php
require "../model.php";

if (isset($_SESSION["login"])) {

// un jpeg de moins de 1Mo, sauvegarde la photo dans le bon répertoire avec le bon nom (ex : photo/profil_12.jpg).

$photo=$_GET["photo"];
$nom_fichier="profil_";






// Récup l'id User
getUser($_SESSION["login"]);

// Echo
echo "ID User : {$result["id_user"]} <br>";
echo "Photo : {$_GET["photo"]} <br>";

$nom_fichier.=strval($result["id_user"]);
echo $nom_fichier;



// $requete_photo = "INSERT INTO user('photo') VALUES (:photo);";
// $stmt_photo = $db->prepare($requete_photo);
// $stmt_photo->bindParam(':photo', $nom_fichier, PDO::PARAM_STR);
// $stmt_photo->execute();


};