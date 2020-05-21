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
	<link rel="stylesheet" href="CSS/style.css">
	<title></title>
</head>
<body>
	<header>
		<h1>Musculation - Administration</h1>
		<nav></nav>
	</header>
	
	<section id="contenu">
		<header><h2>Liste des exercice</h2></header>
		<a class="btn" href="ajouter-exercice.html">Ajouter un exercice</a>

		<div class="statistique">
			<a class="btn" href="contenu.php">Contenu</a>
			<a class="btn" href="visites.php">Visites</a>
		</div>

		<?php
		foreach($listeExercice as $exercice)
		{
            //echo $film["titre"];
		?>
		<div class="musculation">
            <h3 class="titre"><?=$exercice["nom"];?></h3>
            <spam id="muscle"><?=$exercice["muscle"];?></span>
            <p class="resume"><?=$exercice["resume"];?></p>
            <span class="image"><?=$exercice["image"];?></span>
            <a class="btn" href="modifier-exercice.php?id=<?=$exercice["id"];?>">Modifier</a>
            <a class="btn" href="supprimer-exercice.php?id=<?=$exercice["id"];?>">Supprimer</a>
        </div>
		<?php
		}
		?>
	
	</section>
	
	<footer><span id="signature"></span></footer>
</body>
</html>
