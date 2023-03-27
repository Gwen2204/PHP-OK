<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disque ajout</title>
</head>
<body>
    <h1>Saisie d'un nouvel artiste</h1>
    <a href="discs.php"><button>Retour à la liste des disques</button></a>
    <br>
    <br>
    <form action="script_disc_ajout.php" method="post" enctype="multipart/form-data">
        <label for="titre_disque">Titre du disque :</label><br>
        <input type="text" name="titre_disque" id="titre_disque">
        <br><br>
        <label for="annee_disque">Année du disque :</label><br>
        <input type="number" name="annee_disque" id="annee_disque">
        <br><br>
        <label for="photo">Image du disque :</label><br>
        <input type="file" id="photo" name="photo">
        <br><br>
        <label for="label_disque">Label du disque :</label><br>
        <input type="text" name="label_disque" id="label_disque">
        <br><br>
        <label for="genre_disque">Genre du disque :</label><br>
        <input type="text" name="genre_disque" id="genre_disque">
        <br><br>
        <label for="prix_disque">Prix du disque :</label><br>
        <input type="number" name="prix_disque" id="prix_disque">
        <br><br>
        <label for="nom_artiste">Nom de l'artiste :</label><br>
        <select name="nom_artiste" id="nom_artiste">
            <option value=0>--Choisir un artiste--</option>
            <option value=1>Neil Young</option>
            <option value=2>YES</option>
            <option value=3>Rolling Stones</option>
            <option value=4>Queens of the Stone Age</option>
            <option value=5>AC/DC</option>
            <option value=6>Marillion</option>
            <option value=7>Bob Dylan</option>
            <option value=8>Fleshtones</option>
            <option value=9>The Clash</option>
        </select>
        <br><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>