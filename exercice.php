<?php
include "connexion.php";

$id = $_GET["id"];
//echo $id;
$MESSAGE_SQL_EXERCICE = "SELECT id, nom, muscle, resume, description, image FROM exercice WHERE id=".$id.";";

$requeteExercice = $connexion->prepare($MESSAGE_SQL_EXERCICE);
$requeteExercice->execute();
$exercice = $requeteExercice->fetch();

?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<header>
		<h1>Exercice</h1>
		<nav></nav>
	</header>
	
	<section id="contenu">
		<header><h2>Détail du exercice</h2></header>
		<div class="exercie">
		<h3 class="nom"><?=$exercice["nom"];?></h3>
		<p class="resume"><?=$exercice["resume"];?></p>
		<p class="description"><?=$exercice["description"];?></p>
		<span class="muscle"><?=$exercice["muscle"];?></span>
		<div class="image"><?=$exercice["image"];?></div>
		</div>
	
	</section>
	
	<footer><span id="signature par moi"></span></footer>
</body>
</html>
