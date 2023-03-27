<?php

// on importe le contenu du fichier "db.php"
include('db.php');
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();
// on lance une requête pour chercher toutes les fiches d'disces
$requete = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id=artist.artist_id");
// on récupère tous les résultats trouvés dans une variable
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
// on clôt la requête en BDD
$requete->closeCursor();
//compter les lignes du tableau
$nb = "Liste des disques (" . count($tableau) . ")";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<title>PDO - Liste</title>
</head>

<body class="px-5">

<div class="d-flex mx-6 my-2 justify-content-between">
<div>
<h1 class="px-5">
<?= $nb ?>
</h1>
</div>
<div>
<a href="disc_new.php?>" class="btn bg-primary text-white my-4">Ajouter</a>
</div>
</div>

<div class="row px-3">

<?php foreach ($tableau as $disc): ?>


<div class="col-6 mx-6">

<div class="d-flex mx-6 my-2" style="height: 265px;">

<div>
<img class="p-3" style="height: 265px" src="./jaquettes/<?= $disc->disc_picture ?>">
</div>

<div class="p-3" style="height: 265px">
<a class="font-weight-bold">
<?= $disc->disc_title ?>
</a><br>
<a class="font-weight-bold">
<?= $disc->artist_name ?>
</a><br>
<a class="font-weight-bold">Label :</a>
<?= $disc->disc_label ?><br>
<a class="font-weight-bold">Year :</a>
<?= $disc->disc_year ?><br>
<a class="font-weight-bold">Genre :</a>
<?= $disc->disc_genre ?><br>

<a href="disc_detail.php?id=<?= $disc->disc_id ?>" class="btn bg-primary text-white my-4">Détail</a>

</div>
</div>

</div>
<?php endforeach; ?>

</div>

</body>

</html>