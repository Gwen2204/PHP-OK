<?php
   $nom=$_POST["nom"];
   $prénom=$_POST["prénom"];
   $age=$_POST["age"];
   $valider=$_POST["valider"];

   if(isset($valider)){
        if(empty ($nom)) $erreur="<li> Nom laissé vide!</li>";
        if(empty ($prénom)) $erreur.="<li>Prénom laissé vide!</li>";
        if(!is_numeric ($age) or $age<12) $erreur.="<li>Age invalide!</li>";
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<header> Inscription </header>
<section>
    <form name="fo" method="post" action="">
        <div class="label">Nom</div>
        <div class="input">
            <input type="text" name="nom" value="<?php echo $nom?>"/>
        </div>
        <div class="label">Prénom</div>
        <div class="input">
            <input type="text" name="prénom" value="<?php echo $prénom?>"/>
        </div>
        <div class="label">Age</div>
        <div class="input">
            <input type="number" min="12" name="age"value="<?php echo $age?>"/>
        </div>
        <div class="input">
            <input type="submit" name="valider" value="M'inscrire" />
        </div>
    </form>
    <div><?php echo $erreur ?></div>
</section>
</body>
</html> 