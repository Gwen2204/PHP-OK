<?php

require "db.php";
    $db = connexionBase();
    $requete = $db->prepare("SELECT * FROM disc WHERE disc_id=?");
    $requete->execute(array($_GET["id"]));
    $myArtist = $requete->fetch(PDO::FETCH_OBJ);
    $requete->closeCursor();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout</title>
</head>
<body>

    <h1>Disque n°<?= $resultat->disc_id; ?></h1>

    <a href="discs.php">Retour à la liste des artistes</a>

    <br>
    <br>

    <form action ="script_disc_modif.php" method="post">

        <label for="nom_for_label"> Title</label><br>
        <input type="text" name="nom" id="nom_for_label">
        <br><br>

        <label for="nom_for_label">Artist</label><br>
        <input type="text" name="nom" id="nom_for_label">
        <br><br>

        <label for="url_for_label">Year</label><br>
        <input type="text" name="url" id="url_for_label">
        <br><br>

        <label for="url_for_label">Genre</label><br>
        <input type="text" name="url" id="url_for_label">
        <br><br>

        <label for="url_for_label">Label</label><br>
        <input type="text" name="url" id="url_for_label">
        <br><br>

        <label for="url_for_label">Price</label><br>
        <input type="text" name="url" id="url_for_label">
        <br><br>

        <label for="url_for_label">Picture</label><br>
        <input type="text" name="url" id="url_for_label">
        <br><br>

        <input type="reset" value="Annuler">
        <input type="submit" value="Modifier">

    </form>
</body>
</html>