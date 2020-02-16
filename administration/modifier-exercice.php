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
		<h1>Musculation - Administration</h1>
		<nav></nav>
	</header>
	
	<section id="contenu">
		<header><h2>Détail du nouveau exercice</h2></header>
		<form class="exercice" action="traitement-modifier-exercice.php" method="POST" enctype="multipart/form-data">
		<div class="champ">
            <label>Nom</label>
            <input type="text" id="nom" name="nom" value="<?=$exercice["nom"]?>"/>
		</div>
		<div class="champ">
            <label>Resume</label>
            <textarea id="resume" name="resume"> <?=$exercice["resume"]?> </textarea>
		</div>
		<div class="champ">
            <label>description</label>
            <textarea id="description" name="description"> <?=$exercice["description"]?> </textarea>
		</div>
		<div class="champ">
            <label>Muscle</label>
            <input type="text" id="muscle" name="muscle" value="<?=$exercice["muscle"]?>"/>
		</div>
		<div class="champ">
            <label for="image">image</label>
            <input type="file" id="image" name="image"/>
		</div>
		<input type="submit" value="Enregistrer"/>
		</form>
	
	</section>
	
	<footer><span id="signature"> MOI</span></footer>
</body>
</html> 
 
