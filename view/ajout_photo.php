<?php


if (isset($_SESSION["login"])) {

    // Répertoire de stockage des images de profil
    $content_dir = 'img/profil/';

    // Vérifie si un fichier a été envoyé
    if (isset($_FILES["image"])) {

        // Récupérer l'extension du fichier téléversé
        $fileExtension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

        // Valider le type de fichier
        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($fileExtension, $allowedExtensions)) {
            exit("Le format de fichier n'est pas autorisé. Seules les images (jpg, jpeg, png, gif) sont acceptées.");
        }

        // Construire le nom du fichier en fonction de l'utilisateur
        $nom_fichier = strval($_SESSION["login"]) . "." . $fileExtension;

        // Supprimer les anciennes images du même utilisateur
        foreach ($allowedExtensions as $ext) {
            $existingFile = $content_dir . "profil_" . strval($_SESSION["login"]) . "." . $ext;
            if (file_exists($existingFile)) {
                unlink($existingFile); // Supprimer le fichier
            }
        }

        // Déplacement du fichier téléversé
        $tmp_file = $_FILES['image']['tmp_name'];
        if (!is_uploaded_file($tmp_file)) {
            exit("Le fichier est introuvable.");
        }

        if (!move_uploaded_file($tmp_file, $content_dir . $nom_fichier)) {
            exit("Impossible de copier le fichier dans $content_dir");
        }

    } else {
        exit("Aucun fichier n'a été téléversé.");
    }
}
