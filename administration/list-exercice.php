<?php
include "connexion.php";
$MESSAGE_SQL_LISTE_EXERCICE = "SELECT id, nom, muscle, resume, image FROM exercice;";

$requeteListeExercice = $connexion->prepare($MESSAGE_SQL_LISTE_EXERCICE);
$requeteListeExercice->execute();
$listeExercice = $requeteListeExercice->fetchAll();
?> 

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<header>
		<h1>Musculation - Administration</h1>
		<nav></nav>
	</header>
	
	<section id="contenu">
		<header><h2>Liste des exercice</h2></header>
		<a href="ajouter-exercice.html">Ajouter un exercice</a>
		<?php
		foreach($listeExercice as $exercice)
		{
            //echo $film["titre"];
		?>
		<div class="musculation">
            <h3 class="titre"><?=$exercice["nom"];?></h3>
            <spam classe="muscle"><?=$exercice["muscle"];?></span>
            <p class="resume"><?=$exercice["resume"];?></p>
            <span class="image"><?=$exercice["image"];?></span>
            <a href="modifier-exercice.php?id=<?=$exercice["id"];?>">Modifier</a>
            <a href="supprimer-exercice.php?id=<?=$exercice["id"];?>">Supprimer</a>
            </div>
		<?php
		}
		?>
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>
