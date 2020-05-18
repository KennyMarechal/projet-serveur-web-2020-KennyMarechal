<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "ExerciceDAO.php";

$exerciceRecherche = $_GET;

$listeExercice = ExerciceDAO::rechercherExerciceAvance($exerciceRecherche);
//print_r($exerciceRecherche);

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
		<h1>Exercice-rechercher</h1>
		<nav></nav>
	</header>
	
	<?php
		foreach($listeExercice as $exercice)
		{
            //echo $film["titre"];
		?>
		<div class="musculation">
        <a href="exercice.php?id=<?=$exercice["id"];?>">
            <h3 class="nom"><?=$exercice["nom"];?></h3>
            </a>
            <spam id="muscle"><?=$exercice["muscle"];?></span>
        </div>
		<?php
		}
        ?>

        <a href="recherche-avancer.html">Retour</a>
</body>
</html>
