<?php

var_dump($_POST);



// Récupération du titre :
if (isset($_POST['titre_disque']) && $_POST['titre_disque'] != "") {
    $titre_disque = $_POST['titre_disque'];
} else {
    $titre_disque = Null;
}


// Récupération de l'année :
if (isset($_POST['annee_disque']) && $_POST['annee_disque'] != "") {
    $annee_disque = $_POST['annee_disque'];
} else {
    $annee_disque = Null;
}


// Récupération du label :
if (isset($_POST['label_disque']) && $_POST['label_disque'] != "") {
    $label_disque = $_POST['label_disque'];
} else {
    $label_disque = Null;
}

// Récupération du genre :
if (isset($_POST['genre_disque']) && $_POST['genre_disque'] != "") {
    $genre_disque = $_POST['genre_disque'];
} else {
    $genre_disque = Null;
}

// Récupération du prix :
if (isset($_POST['prix_disque']) && $_POST['prix_disque'] != "") {
    $prix_disque = $_POST['prix_disque'];
} else {
    $prix_disque = Null;
}

// Récupération du nom de l'artiste :
if (isset($_POST['nom_artiste']) && $_POST['nom_artiste'] != "") {
    $nom_artiste = $_POST['nom_artiste'];
} else {
    $nom_artiste = Null;
}


$filename=Null;
$ide = $_POST['hidden'];


// Récupération et vérification de la photo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si le fichier a été uploadé sans erreur.
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed))
            die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize)
            die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if (in_array($filetype, $allowed)) 

        if(file_exists("./jaquettes/" . $_FILES["photo"]["name"])){
            echo $filename . " existe déjà.";
        } else { 
            move_uploaded_file($_FILES["photo"]["tmp_name"], "./jaquettes/" . $_FILES["photo"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";
            
        } else {
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.";
        }
    } else {
        echo "Error: " . $_FILES["photo"]["error"];
    }
}


// S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
require "db.php";
$db = connexionBase();

// Récupération du nom de l'artiste :
if ($filename==Null) {
    $filename = $_POST['hidpic'];
}

try {
    // Construction de la requête INSERT sans injection SQL :
    $requete = $db->prepare("UPDATE disc SET disc_title=:titre_disque, disc_year=:annee_disque, disc_picture=:photo, disc_label=:label_disque, disc_genre=:genre_disque, disc_price=:prix_disque, artist_id=:nom_artiste WHERE disc.disc_id=$ide;");
 

    // Association des valeurs aux paramètres via bindValue() :
    $requete->bindValue(":titre_disque", $titre_disque, PDO::PARAM_STR);
    $requete->bindValue(":annee_disque", $annee_disque, PDO::PARAM_INT);
    $requete->bindValue(":photo", $filename, PDO::PARAM_STR);
    $requete->bindValue(":label_disque", $label_disque, PDO::PARAM_STR);
    $requete->bindValue(":genre_disque", $genre_disque, PDO::PARAM_STR);
    $requete->bindValue(":prix_disque", $prix_disque, PDO::PARAM_INT);
    $requete->bindValue(":nom_artiste", $nom_artiste, PDO::PARAM_STR);



    // Lancement de la requête :
    $requete->execute();

    // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();
}

// Gestion des erreurs
catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_disc_modif.php)");
}

// Si OK: redirection vers la page artists.php
header("Location: disc.php");

// Fermeture du script
exit;
?>