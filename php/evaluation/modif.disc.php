
<?php

// On se connecte à la BDD via notre fichier db.php :
require "db.php";
$db = connexionBase();

// On récupère l'ID passé en paramètre :
$id = $_GET["id"];

// On crée une requête préparée avec condition de recherche :
$requete = $db->prepare(
    "SELECT * 
    FROM disc
    JOIN artist ON disc.artist_id=artist.artist_id
    WHERE disc.disc_id=?"
);

// on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
$requete->execute(array($id));

// on récupère le (et seul) résultat :
$myArtist = $requete->fetch(PDO::FETCH_OBJ);

// on clôt la requête en BDD
$requete->closeCursor();



?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="icon" href="assets/img/images/Logo_Afpa.ico">
    <title>Disque ajout</title>
</head>

<body class="p-3">

    <h1>Saisie d'un nouvel artiste</h1>

    <a href="discs.php" class="btn bg-primary text-white my-4">Retour aux disques</a>

    <br>
    <br>

    <form action="script_disc_modif.php?id=.$id" method="post" enctype="multipart/form-data">


        <label for="titre_disque">Titre du disque :</label><br>
        <input  type="text" name="titre_disque" id="titre_disque" value="<?= $myArtist->disc_title ?>">
        <br><br>

        <label for="annee_disque">Année du disque :</label><br>
        <input  type="number" name="annee_disque" id="annee_disque" value="<?= $myArtist->disc_year ?>">
        <br><br>

        <label for="label_disque">Label du disque :</label><br>
        <input  type="text" name="label_disque" id="label_disque" value="<?= $myArtist->disc_label ?>">
        <br><br>

        <label for="photo">Image du disque :</label><br>
        <input type="file" id="photo" name="photo">
        <br><br>
        <img src="../jaquettes/<?= $myArtist->disc_picture ?>" alt="<?= $myArtist->disc_picture ?>" />
        <br><br>

        <input type="hidden" name="hidden" id="hidden" value="<?= $myArtist->disc_id ?>">
        <input type="hidden" name="hidpic" id="hidpic" value="<?= $myArtist->disc_picture ?>">

        <label for="nom_artiste">Nom de l'artiste :</label><br>
        <select name="nom_artiste" id="nom_artiste">
            <option value="<?= $myArtist->artist_id ?>"><?= $myArtist->artist_name ?></option>
            <option value=1>Neil Young</option>
            <option value=2>YES</option>
            <option value=3>Rolling Stones</option>
            <option value=4>Queens of the Stone Age</option>
            <option value=5>Serge Gainsbourg</option>
            <option value=6>AC/DC</option>
            <option value=7>Marillion</option>
            <option value=8>Bob Dylan</option>
            <option value=9>Fleshtones</option>
            <option value=10>The Clash</option>
        </select>
        <br><br>


        <label for="genre_disque">Genre du disque :</label><br>
        <input  type="text" name="genre_disque" id="genre_disque" value="<?= $myArtist->disc_genre ?>">
        <br><br>

        <label for="prix_disque">Prix du disque :</label><br>
        <input  type="number" name="prix_disque" id="prix_disque" value="<?= $myArtist->disc_price ?>">
        <br><br>
        <input type="hidden" name="hidden" id="hidden" value="<?= $myArtist->disc_id ?>">



        <input type="submit" value="Modifier" class="btn bg-primary text-white my-4">
        <a href="disc_detail.php?id=<?= $myArtist->disc_id ?>" class="btn bg-primary text-white my-4">Retour</a>


    </form>
</body>

</html>