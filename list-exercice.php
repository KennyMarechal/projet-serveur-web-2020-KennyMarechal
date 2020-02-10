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
		<h1>Cinéma</h1>
		<nav></nav>
	</header>
	
	<section id="contenu">
		<header><h2>Liste des exercice</h2></header>
		<?php
		foreach($listeExercice as $exercice)
		{
            //echo $film["titre"];
		?>
		<div class="film">
		<a href="film.php?id=<?=$exercice["id"];?>">
		<h3 class="titre"><?=$exercice["nom"];?></h3>
		</a>
		<spam classe="muscle"><?=$exercice["muscle"];?></span>
		<p class="resume"><?=$exercice["resume"];?></p>
		<span class="image"><?=$exercice["image"];?></span>
		</div>
		<?php
		}
		?>
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>
