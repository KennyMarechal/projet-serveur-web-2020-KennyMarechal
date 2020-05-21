<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "ExerciceDAO.php";

$id = filter_input(INPUT_GET, 'id' , FILTER_VALIDATE_INT);
$exercice = ExerciceDAO::lireExercice($id);
ExerciceDAO::ajouterClic($_SERVER);
//print_r($_SERVER);

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
		<h1>Exercice</h1>
		<nav></nav>
	</header>
	
	<section id="contenu">
		<header><h2>Détail de l'exercice</h2></header>
		<div class="exercie">
		<h3 class="nom"><?=$exercice["nom"];?></h3>
		<p class="resume"><?=$exercice["resume"];?></p>
		<p class="description"><?=$exercice["description"];?></p>
		<span class="muscle"><?=$exercice["muscle"];?></span>
		<div class="image"><?=$exercice["image"];?></div>
		</div>
	
	</section>
	
	<a href="list-exercice.php">Retour</a>
</body>
</html>
