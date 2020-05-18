<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "ExerciceDAO.php";

$listeExercice = ExerciceDAO::listerExercice();
?> 

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<title></title>
</head>
<body>
	<header>
		<h1 clase="tire">Musculation</h1>
		<nav></nav>
	</header>
	
	<section id = "contenu">
		<header><h2>Liste des exercice</h2></header>

		<section id = "section-recherche">
		<form id = "recherche" action="traitement-recherche-facile.php" method="GET" enctype="multipart/form-data">

			<div class = "champ">
				<input type="text" name = "rechercheText">
			</div>

			<div id ="bouton-recherche">
				<input type="submit" value="Rechercher"/>
			</div>
		</form>

		<a href="recherche-avancer.html">Recherche Avancer</a>
		
		</section>

		<?php
		foreach($listeExercice as $exercice)
		{
            //echo $film["titre"];
		?>
		<div class="musculation">
            <a href="exercice.php?id=<?=$exercice["id"];?>">
            <h3 class="titre"><?=$exercice["nom"];?></h3>
            </a>
            <spam id="muscle"><?=$exercice["muscle"];?></span>
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
