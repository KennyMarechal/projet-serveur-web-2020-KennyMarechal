<?php
include "connexion.php";

$id = $_GET["id"];

$MESSAGE_SQL_EXERCICE = "DELETE FROM exercice WHERE id=".$id.";";
//echo $MESSAGE_SQL_EXERCICE;
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
	
	<section id="contenu">
		<p>L'exercice est bien supprimer</p>
		
		<a href="list-exercice.php">Retour</a>
	</section>
	
</body>
</html>
