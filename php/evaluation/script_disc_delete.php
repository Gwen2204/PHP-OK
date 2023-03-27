
<?php
   // on se connecte à la BDD via notre fichier db.php
    require "db.php"; 
    $db = ConnexionBase();
   
   // on récupère l'ID passé en paramètre:

   $id = $_POST["hidden"];

   // on crée une requête préparée avec condition de recherche:
   $requete2 = $db->prepare(
    "DELETE 
     FROM disc 
     WHERE disc.disc_id =?"


   );

// on ajoute l'ID du disque passé dans l'url en paramètre et on exécute: 
$requete2 -> execute(array($id));

//on récupère le résultat:
$myArtist2 = $requete2-> fetch(PDO::FETCH_OBJ);
    
//on clôt la requete en BDD
$requete2->closeCursor();

 
header("Location: discs.php");
   
?>
    