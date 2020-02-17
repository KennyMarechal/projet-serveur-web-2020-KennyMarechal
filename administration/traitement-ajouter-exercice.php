<?php
include "connexion.php";

//print_r($_FILES);
$repertoireIllustration = $_SERVER['DOCUMENT_ROOT'] . "/projet-serveur-web-2020-KennyMarechal/illustration/";
$fichierDestination = $repertoireIllustration . $_FILES['image']['name'];
$fichierSource = $_FILES['image']['tmp_name'];

if(move_uploaded_file($fichierSource,$fichierDestination))
{?>
	Votre envoi de fichier a bien fonctionné
	<img src="../illustration/<?=$_FILES['image']['name']?>" alt=""/>
<?php
}

$nom = $_POST["nom"];
$resume = $_POST["resume"];
$description = $_POST["description"];
$image = $_FILES['image']['name'];
$muscle = $_POST["muscle"];


$MESSAGE_SQL_AJOUTER_EXERCICE = "INSERT INTO exercice (nom, resume, description, muscle, image) VALUES(" ."'" . $nom . "',"."'" . $resume . "',".
"'" . $description . "',".
"'" . $muscle . "',".
"'" . $image . "'".
");";

//echo $MESSAGE_SQL_AJOUTER_EXERCICE;

$requeteAjouterExercice = $connexion->prepare($MESSAGE_SQL_AJOUTER_EXERCICE);
$reussiteAjout = $requeteAjouterExercice->execute();

if($reussiteAjout){?>
Votre exercice a ete a ajouté a la base de données
<?php
}
?> 
 
